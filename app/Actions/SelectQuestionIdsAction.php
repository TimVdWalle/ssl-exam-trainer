<?php

namespace App\Actions;

use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelectQuestionIdsAction
{
    /**
     * @return \Illuminate\Support\Collection<int, int>
     * @throws \Exception
     */
    public function __invoke(): \Illuminate\Support\Collection
    {
        /** @var int $questionsPerTest */
        $questionsPerTest = config('ssl_exam_trainer.questions_per_test');
        $questionsPerTest = intval($questionsPerTest);
        $maxWrongQuestions = intval(floor($questionsPerTest * config('ssl_exam_trainer.max_wrong_percentage') / 100));

        if (Auth::check()) {
            $userId = Auth::id();

            // first, select some questions that were previously answered wrong more than they were answered correct by the user
            $wrongAnsweredQuestionIds = UserAnswer::query()
                ->select('question_id',
                    DB::raw('SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) as wrong_count'),
                    DB::raw('SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END) as right_count'))
                ->where('user_id', $userId)
                ->groupBy('question_id')
                ->havingRaw('SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) > SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END)')
                ->orderBy(DB::raw('RAND()'))

                ->limit($maxWrongQuestions)
                ->pluck('question_id')
            ;

            // next, select some questions that were never answered before and for that we need previously answered question ids
            $previouslyAnsweredQuestionIds = UserAnswer::query()
                ->where('user_id', '=', $userId)
                ->distinct()
                ->pluck('question_id');

            $neverAnsweredQuestionIds = Question::query()
                ->whereNotIn('id', $previouslyAnsweredQuestionIds)
                ->distinct()
                ->orderBy(DB::raw('RAND()'))
                ->limit($questionsPerTest - $wrongAnsweredQuestionIds->count())
                ->pluck('id');

            $result = $wrongAnsweredQuestionIds->concat($neverAnsweredQuestionIds->toArray());

            // finally, if not enough questions yet, select again from the whole pool
            // allowing for previously answered questions (both correct or wrong) to be selected
            $setSize = $wrongAnsweredQuestionIds->count() + $neverAnsweredQuestionIds->count();
            if ($setSize < $questionsPerTest) {
                $additionalQuestionIDs = Question::query()
                    ->whereNotIn('id', $wrongAnsweredQuestionIds)
                    ->whereNotIn('id', $neverAnsweredQuestionIds)
                    ->distinct()
                    ->orderByRaw('wrong_count - right_count DESC, wrong_count DESC, RAND()')
                    ->limit($questionsPerTest - $setSize)
                    ->pluck('id');

                $result = $result->concat($additionalQuestionIDs->toArray());
            }

//            dd($wrongAnsweredQuestionIds, $previouslyAnsweredQuestionIds, $neverAnsweredQuestionIds, $additionalQuestionIDs ?? null, $setSize, $result);

            return $result->shuffle();
        } else {
            // If user is not logged in, select randomly
            return Question::inRandomOrder()->take($questionsPerTest)->pluck('id');
        }

//        // Select 15 random questions. Adjust the logic for weighting based on user history if needed.
//        /** @var int $questionsPerTest */
//        $questionsPerTest = config('ssl_exam_trainer.questions_per_test');
//
//        return Question::query()
//            ->inRandomOrder()
//            ->take(intval($questionsPerTest))
//            ->pluck('id');
    }

}
