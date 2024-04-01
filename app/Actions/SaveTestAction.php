<?php

namespace App\Actions;

use App\DTOs\SubmittedTestDTO;
use App\Models\Question;
use App\Models\Test;
use App\Models\UserAnswer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveTestAction
{
    /**
     * Evaluate the user's test submission.
     *
     * @param SubmittedTestDTO $submittedTestDTO
     * @param Collection<int, Question> $questions
     * @return Test
     */
    public function __invoke(string $hash, SubmittedTestDTO $submittedTestDTO, Collection $questions): Test
    {
        $userId = Auth::check() ? Auth::id() : null;

        $correctCount = 0;
        $test = Test::create([
            'hash' => $hash,
//            'score' => 0,
//            'score_percentage' => 0,
//            'passed' => false,
            'user_id' => $userId,
            'number_of_questions' => $questions->count()
        ]);

        foreach ($questions as $question) {
            $isCorrect = false;
            $selectedAnswerId = $submittedTestDTO->answers->get($question->id);
            $correctAnswer = $question->answers->where('is_correct', true)->first();

            if ($selectedAnswerId && $correctAnswer && $selectedAnswerId == $correctAnswer->id) {
                $correctCount++;
                $isCorrect = true;
            }

            UserAnswer::create([
                'test_id' => $test->id,
                'user_id' => $userId,
                'question_id' => $question->id,
                'answer_id' => $selectedAnswerId,
                'is_correct' => $isCorrect,
            ]);
        }

        $scorePercentage = ($questions->count() > 0) ? intval(($correctCount / $questions->count()) * 100) : 0;
        $test->score = $correctCount;
        $test->score_percentage = $scorePercentage;
        $test->passed = ($correctCount >= config('ssl_exam_trainer.min_correct_to_pass'));
        $test->save();

        return $test;
    }
}
