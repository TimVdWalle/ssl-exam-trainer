<?php

namespace App\Actions;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class SelectQuestionsAction
{
    /**
     * @return Collection<int, Question>
     * @throws \Exception
     */
    public function __invoke(): Collection
    {
        // Select 15 random questions. Adjust the logic for weighting based on user history if needed.
        /** @var int $questionsPerTest */
        $questionsPerTest = config('ssl_exam_trainer.questions_per_test');

        return Question::query()
            ->with(['answers' => function ($query) {
                $query->orderBy('option', 'asc');
            }])
            ->inRandomOrder()
            ->take(intval($questionsPerTest))
            ->get();
    }

}
