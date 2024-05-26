<?php

namespace App\Actions;

use App\DTOs\MetricsDTO;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use App\Models\UserAnswer;
use DateInterval;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetUserMetricsAction
{
    /**
     * @return MetricsDTO
     * @throws \Exception
     */
    public function __invoke(int $userId): MetricsDTO
    {
        $userTests = Test::query()->where('user_id', $userId)->get();

        $totalTestsPassed = $userTests->where('passed', true)->count();
        $passRate = ($totalTestsPassed / max($userTests->count(), 1)) * 100;

        // Adjusting average score calculation
        $totalScore = 0;
        $totalPossibleScore = 0;
        foreach ($userTests as $test) {
            $totalScore += $test->score;
            $totalPossibleScore += $test->number_of_questions; // Assuming each question scores 1 point
        }
        $averageScore = $totalPossibleScore > 0 ? intval(floor(($totalScore / $totalPossibleScore) * 100)) : 0;

        $intervalData = $this->getInterval($userTests);
//        dd($interval);
//        $interval = 'day';
        $progressOverTime = $this->getProgressOverTime($userTests, $userId, $intervalData);

        $totalQuestions = Question::query()->count();

        $correctlyAnsweredQuestions = UserAnswer::query()
            ->select('question_id', DB::raw('MAX(created_at) as latest'))
            ->where('user_id', $userId)
            ->where('is_correct', true)
            ->groupBy('question_id')
            ->havingRaw('MAX(is_correct) = true')
            ->count();

        $totalAnswers = UserAnswer::query()
            ->whereIn('test_id', $userTests->pluck('id'))
            ->distinct('question_id')
            ->count('question_id');

        return new MetricsDTO(
            $passRate,
            $averageScore,
            $progressOverTime,
            $totalQuestions,
            $totalAnswers,
            $userTests->count(),
            $totalTestsPassed,
            $correctlyAnsweredQuestions,
        );
    }

    /**
     * @param int $userId
     * @param $userTests
     * @param string $interval
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Collection
     * @throws Exception
     */
    private function getProgressOverTime($userTests, int $userId, array $intervalData)
    {
        $results = collect();
        $interval = $intervalData['interval'];
        $startDate = $intervalData['startDate'];
        $endDate = $intervalData['endDate'];

        switch ($interval) {
            case 'day':
                $dateInterval = new DateInterval('P1D'); // 1 day
                break;
            case 'week':
                $dateInterval = new DateInterval('P1W'); // 1 week
                break;
            case 'month':
                $dateInterval = new DateInterval('P1M'); // 1 month
                break;
            default:
                throw new Exception('Invalid interval specified.');
        }

        $answers = UserAnswer::query()
            ->where('user_id', '=', $userId)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->where('is_correct', '=', true)
            ->orderBy('created_at')
            ->get();

        $results = collect();
        $loopDate = $startDate;
        while($loopDate <= $endDate){
            // Increment date by the interval
            $loopDate->add($dateInterval);
//            echo $loopDate->format('Y-m-d') . "\n : "; // Format as desired

            $progressCount = $answers->where('created_at', '<=', $loopDate)->pluck('question_id')->unique()->count();
//            echo($progressCount);
//            echo('<br />');

            $results->push([
                'the_date' => $loopDate,
                'progress' => $progressCount,
            ]);


        }  ;


//        dd($results);

//        // Get the user's first and last test dates
//        /** @var ?Carbon $firstTestDate */
//        $firstTestDate = Test::where('user_id', $userId)->oldest('created_at')->first()->created_at ?? null;
//        /** @var ?Carbon $lastTestDate */
//        $lastTestDate = Test::where('user_id', $userId)->latest('created_at')->first()->created_at ?? now();
//
//        // Determine the total span of activity
//        $activitySpan = $firstTestDate ? $lastTestDate->diffInDays($firstTestDate) : 0;
//
//        // Analyze the density of activity (tests per week)
//        $totalTests = $userTests->count();
//        $weeksActive = max($activitySpan / 7, 1);
//        $testsPerWeek = $totalTests / $weeksActive;
//
//
//
//        // Determine the optimal period based on activity type
//        if ($testsPerWeek >= 3) {
//            // Frequent Tester: Show the last year
//            $optimalStart = now()->subYear();
//        } elseif ($activitySpan > 365) {
//            // Sporadic Tester with long history: Focus on the last 6 months to a year
//            $optimalStart = now()->subMonths(6);
//        } else {
//            // Concentrated Activity or Short History: Show the entire span
//            $optimalStart = $firstTestDate;
//        }
//
//        if (!$optimalStart) {
//            return collect();
//        }


        return $results;
    }


    public function getInterval(Collection $userTests)
    {
        /** @var ?Carbon $firstTestDate */
        $firstTestDate = $userTests->min('created_at');
        /** @var ?Carbon $lastTestDate */
        $lastTestDate = $userTests->max('created_at');

        if (!$firstTestDate || !$lastTestDate) {
            return [
                'interval' => 'month',
                'startDate' => now()->subMonths(6),
                'endDate' => now()
            ];
        }

        $startDate = Carbon::parse($firstTestDate);
        $endDate = Carbon::parse($lastTestDate);
        $totalDays = $startDate->diffInDays($endDate);
        $totalWeeks = $startDate->diffInWeeks($endDate);
        $totalMonths = $startDate->diffInMonths($endDate);

        $totalTests = $userTests->count();

        // Determine density
        $testsPerDay = $totalDays > 0 ? $totalTests / $totalDays : 0;
        $testsPerWeek = $totalWeeks > 0 ? $totalTests / $totalWeeks : 0;

        // Decide the interval
        if ($totalMonths > 12 || $testsPerWeek < 1) {
            $interval = 'month';
        } elseif ($testsPerDay < 1) {
            $interval = 'week';
        } else {
            $interval = 'day';
        }

        return [
            'interval' => $interval,
//            'interval' => 'day',
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}
