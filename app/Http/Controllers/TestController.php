<?php
namespace App\Http\Controllers;

use App\Actions\CreateNewHashAction;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\UserAnswer;
use App\Services\QuestionSelectionService;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    protected QuestionSelectionService $questionSelectionService;
    protected CreateNewHashAction $createNewHashAction;

    public function __construct(QuestionSelectionService $questionSelectionService, CreateNewHashAction $createNewHashAction)
    {
        Bugsnag::notifyError('test error from server', "testing first error from server to bugsnag");

        $t = (5) / (5 - 2 - 3);
        $this->questionSelectionService = $questionSelectionService;
        $this->createNewHashAction = $createNewHashAction;
    }

    public function create()
    {
//        $hash = $this->
        $questions = $this->questionSelectionService->selectQuestions();

        // Return a view with the questions. Adjust the view path and variable names as necessary.
        return view('test.create', compact('questions'));
    }

    public function store(TestRequest $request)
    {
//        $data = $request->validated();

        $data = $request;
        dd($data);

        // Create a new TestSession instance
        $testSession = new Test([
            'user_id' => Auth::id(),
            'passed' => true
        ]);
        $testSession->save();

        // Assuming $data['answers'] contains ['question_id' => x, 'answer_id' => y] pairs
        foreach ($data['answers'] as $answerData) {
            $userAnswer = new UserAnswer([
                'session_id' => $testSession->id,
                'question_id' => $answerData['question_id'],
                'answer_id' => $answerData['answer_id'],
                'is_correct' => false,          // TODO
            ]);
            $userAnswer->save();
        }

        // Redirect to a results page or somewhere appropriate
        return redirect()->route('test_sessions.show', $testSession);
    }

    // Additional methods like show() for displaying results, etc.
}
