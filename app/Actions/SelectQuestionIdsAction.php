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

        /** @var int $correctWrongRatio */
        $correctWrongRatio = config('ssl_exam_trainer.correct_wrong_ratio');

        $questionsPerTest = intval($questionsPerTest);
        $maxWrongQuestions = intval(floor($questionsPerTest * config('ssl_exam_trainer.max_wrong_percentage') / 100));

        if (Auth::check()) {
            $userId = Auth::id();

            $correctlyAnsweredQuestions = UserAnswer::query()
                ->select('question_id', DB::raw('MAX(created_at) as latest'))
                ->where('user_id', $userId)
                ->where('is_correct', true)
                ->groupBy('question_id')
                ->havingRaw('MAX(is_correct) = true')
                ->count();

            $totalQuestionsCount = config('ssl_exam_trainer.total_questions_count');
            if($correctlyAnsweredQuestions >= $totalQuestionsCount * 0.95){
                $maxWrongQuestions = intval(floor($questionsPerTest * config('ssl_exam_trainer.max_wrong_percentage_when_all_questions_answered') / 100));
            }

            // first, select some questions that were previously answered wrong more than they were answered correct by the user
            $wrongAnsweredQuestionIds = UserAnswer::query()
                ->select('question_id',
                    DB::raw('SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) as wrong_count'),
                    DB::raw('SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END) as right_count'))
                ->where('user_id', $userId)
                ->groupBy('question_id')
                ->havingRaw("(SUM(CASE WHEN is_correct = 0 THEN 1 ELSE 0 END) * {$correctWrongRatio}) >= (SUM(CASE WHEN is_correct = 1 THEN 1 ELSE 0 END))")
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
                    ->orderBy(DB::raw('RAND()'))
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
