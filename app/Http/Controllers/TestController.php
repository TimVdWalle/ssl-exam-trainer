<?php
namespace App\Http\Controllers;

use App\Actions\CreateNewHashAction;
use App\Actions\GetQuestionsForHashAction;
use App\Actions\SelectQuestionIdsAction;
use App\Http\Requests\TestRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function create(CreateNewHashAction $createNewHashAction, SelectQuestionIdsAction $selectQuestionsAction)
    {
        $hash = $createNewHashAction();
        $questionIds = $selectQuestionsAction();

        Cache::put('test_questions_hash_' . $hash, $questionIds, now()->addHours(1));

        return redirect()->route('practice-exam.show', ['hash' => $hash]);
    }

    /**
     * @param string $hash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function show(string $hash, GetQuestionsForHashAction $getQuestionsForHash)
    {
        $questions = $getQuestionsForHash($hash);

        if (!$questions->count()) {
            return redirect()->route('practice-exam.create');
        }

        return view('test.show', compact('questions', 'hash'));    }

    /**
     * @param TestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TestRequest $request)
    {
//        $data = $request->validated();

        $data = $request;
//        dd($data);

        // Create a new TestSession instance
//        $testSession = new Test([
//            'user_id' => Auth::id(),
//            'passed' => true
//        ]);
//        $testSession->save();
//
//        // Assuming $data['answers'] contains ['question_id' => x, 'answer_id' => y] pairs
//        foreach ($data['answers'] as $answerData) {
//            $userAnswer = new UserAnswer([
//                'session_id' => $testSession->id,
//                'question_id' => $answerData['question_id'],
//                'answer_id' => $answerData['answer_id'],
//                'is_correct' => false,          // TODO
//            ]);
//            $userAnswer->save();
//        }

        // Redirect to a results page or somewhere appropriate
        return redirect()->route('test_sessions.show');
    }

    // Additional methods like show() for displaying results, etc.
}
