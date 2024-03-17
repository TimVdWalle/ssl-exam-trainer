<?php

namespace App\Actions;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class GetQuestionsForHashAction
{
    /**
     * @return \Illuminate\Support\Collection<int, Question>
     * @throws \Exception
     */
    public function __invoke(string $hash): \Illuminate\Support\Collection
    {
        $questionIds = Cache::get('test_questions_hash_' . $hash);

        if(!$questionIds){
            return collect();
        }

        $questions = Question::whereIn('id', $questionIds)
            ->with(['answers' => function ($query) {
                $query->orderBy('option', 'asc');
            }])
            ->get();

        return $questions;
    }
}
