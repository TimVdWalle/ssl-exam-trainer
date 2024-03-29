<?php

namespace App\Actions;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class SelectQuestionIdsAction
{
    /**
     * @return \Illuminate\Support\Collection<int, int>
     * @throws \Exception
     */
    public function __invoke(): \Illuminate\Support\Collection
    {
        // Select 15 random questions. Adjust the logic for weighting based on user history if needed.
        /** @var int $questionsPerTest */
        $questionsPerTest = config('ssl_exam_trainer.questions_per_test');

        return Question::query()
            ->inRandomOrder()
            ->take(intval($questionsPerTest))
            ->pluck('id');
    }

}
