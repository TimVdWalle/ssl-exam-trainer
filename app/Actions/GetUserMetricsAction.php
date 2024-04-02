<?php

namespace App\Actions;

use App\DTOs\MetricsDTO;
use App\Models\Question;
use App\Models\Test;
use App\Models\UserAnswer;
use Illuminate\Support\Carbon;
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

        $scoresOverTime = $this->getScoresOverTime($userId, $userTests);

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

        $interval = $this->getInterval($userTests);
//        dd($interval);

        return new MetricsDTO(
            $passRate,
            $averageScore,
            $scoresOverTime,
            $totalQuestions,
            $totalAnswers,
            $userTests->count(),
            $totalTestsPassed,
            $correctlyAnsweredQuestions,
        );
    }

    private function getScoresOverTime(int $userId, $userTests)
    {
        // Get the user's first and last test dates
        $firstTestDate = Test::where('user_id', $userId)->oldest('created_at')->first()->created_at ?? null;
        $lastTestDate = Test::where('user_id', $userId)->latest('created_at')->first()->created_at ?? now();

        // Determine the total span of activity
        $activitySpan = $firstTestDate ? $lastTestDate->diffInDays($firstTestDate) : 0;

        // Analyze the density of activity (tests per week)
        $totalTests = $userTests->count();
        $weeksActive = max($activitySpan / 7, 1);
        $testsPerWeek = $totalTests / $weeksActive;

        // Determine the optimal period based on activity type
        if ($testsPerWeek >= 3) {
            // Frequent Tester: Show the last year
            $optimalStart = now()->subYear();
        } elseif ($activitySpan > 365) {
            // Sporadic Tester with long history: Focus on the last 6 months to a year
            $optimalStart = now()->subMonths(6);
        } else {
            // Concentrated Activity or Short History: Show the entire span
            $optimalStart = $firstTestDate;
        }

        // Fetch and prepare tests within the optimal period for the chart
        $scoresOverTime = Test::query()->where('user_id', $userId)
            ->where('created_at', '>=', $optimalStart)
            ->orderBy('created_at')
            ->get(['score', 'created_at'])
            ->map(function ($test) {
                return ['score' => $test->score, 'date' => $test->created_at->toDateString()];
            });

        return $scoresOverTime;
    }

    public function getInterval($userTests): string
    {
        $firstTestDate = $userTests->min('created_at');
        $lastTestDate = $userTests->max('created_at');

        if (!$firstTestDate || !$lastTestDate) {
            // Default to monthly if there are no tests
            return 'monthly';
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
            return 'monthly';
        } elseif ($testsPerDay < 1) {
            return 'weekly';
        } else {
            return 'daily';
        }
    }

}
