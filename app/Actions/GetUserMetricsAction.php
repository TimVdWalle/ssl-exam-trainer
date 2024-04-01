<?php

namespace App\Actions;

use App\DTOs\MetricsDTO;
use App\Models\Question;
use App\Models\Test;
use App\Models\UserAnswer;

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

        /** @var array<string, int|string> $scoresOverTime */
        $scoresOverTime = $userTests->sortBy('created_at')->values()->map(function ($test) {
            return ['score' => $test->score, 'date' => $test->created_at ? $test->created_at->toDateString() : ''];
        })->toArray();

        $totalQuestions = Question::query()->count();

        $totalAnswers = UserAnswer::query()
            ->whereIn('test_id', $userTests->pluck('id'))
            ->distinct('question_id')
            ->count('question_id');

        return new MetricsDTO(
            $passRate,
            $averageScore,
            $scoresOverTime,
            $totalQuestions,
            $totalAnswers,
            $userTests->count(),
            $totalTestsPassed,
        );
    }

}
