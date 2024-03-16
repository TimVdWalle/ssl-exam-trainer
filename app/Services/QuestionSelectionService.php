<?php

namespace App\Services;

use App\Models\Question;

class QuestionSelectionService
{
    public function selectQuestions()
    {
        // Select 15 random questions. Adjust the logic for weighting based on user history if needed.
        return Question::query()
            ->with(['answers' => function ($query) {
                $query->orderBy('option', 'asc');
            }])
            ->inRandomOrder()
            ->take(config('ssl_exam_trainer.questions_per_test'))
            ->get();
    }
}
