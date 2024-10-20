<?php

namespace App\Actions;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelectWrongQuestionAction
{
    /**
     * @return \Illuminate\Support\Collection<int, int>
     * @throws \Exception
     */
    public function __invoke(): \Illuminate\Support\Collection
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $wrongAnsweredQuestionIds = UserAnswer::query()
                ->select('question_id',
                    DB::raw('SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) as wrong_count'))
                ->where('user_id', $userId)
                ->groupBy('question_id')
                ->havingRaw("SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) > 0")
                ->orderByDesc(DB::raw('wrong_count'))

                ->pluck('question_id')
            ;

            $questions = Question::whereIn('id', $wrongAnsweredQuestionIds)
                ->with(['answers' => function ($query) {
                    $query->orderBy('option', 'asc');
                }])
                ->get();

            return $questions;
        } else {
            // If user is not logged in, select randomly
            return collect();
        }
    }

}
