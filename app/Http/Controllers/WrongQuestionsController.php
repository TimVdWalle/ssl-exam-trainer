<?php

namespace App\Http\Controllers;

use App\Actions\CheckIfTestExistsForHash;
use App\Actions\CreateNewHashAction;
use App\Actions\GetQuestionsForHashAction;
use App\Actions\SaveTestAction;
use App\Actions\SelectQuestionIdsAction;
use App\Actions\SelectWrongQuestionAction;
use App\DTOs\SubmittedTestDTO;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class WrongQuestionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function show(SelectWrongQuestionAction $selectWrongQuestionAction)
    {
        if (!Auth::check()) {
            abort(500);
        }

        $wrongQuestions = $selectWrongQuestionAction();

        if (!$wrongQuestions->count()) {
            return redirect()->route('dashboard.show');
        }

        return view('wrong-questions.show', compact( 'wrongQuestions'));
    }
}
