<?php
namespace App\Http\Controllers;

use App\Http\Requests\TestSessionRequest;
use App\Models\Test;
use App\Models\UserAnswer;
use App\Services\QuestionSelectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    protected $questionSelectionService;

    public function __construct(QuestionSelectionService $questionSelectionService)
    {
        $this->questionSelectionService = $questionSelectionService;
    }

    public function create()
    {
        $questions = $this->questionSelectionService->selectQuestions();

        // Return a view with the questions. Adjust the view path and variable names as necessary.
        return view('test.create', compact('questions'));
    }

    public function store(Request $request)
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
