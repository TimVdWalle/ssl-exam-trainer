<?php
namespace App\Http\Controllers;

use App\Actions\CreateNewHashAction;
use App\Actions\SelectQuestionIdsAction;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\UserAnswer;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function show(string $hash)
    {
        dd($hash);
    }

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
