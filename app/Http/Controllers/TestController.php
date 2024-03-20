<?php

namespace App\Http\Controllers;

use App\Actions\CheckIfTestExistsForHash;
use App\Actions\CreateNewHashAction;
use App\Actions\EvaluateTestAction;
use App\Actions\GetQuestionsForHashAction;
use App\Actions\SaveTestAction;
use App\Actions\SelectQuestionIdsAction;
use App\DTOs\SubmittedTestDTO;
use App\Http\Requests\TestRequest;
use App\Models\Test;
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
    public function show(string $hash, GetQuestionsForHashAction $getQuestionsForHash, CheckIfTestExistsForHash $checkIfTestExistsForHash)
    {
        $alreadySubmitted = $checkIfTestExistsForHash($hash);

        // If a test with a score or passed status exists, redirect to the results page
        if ($alreadySubmitted) {
            return redirect()->route('practice-exam.result', ['hash' => $hash]);
        }

        $questions = $getQuestionsForHash($hash);

        if (!$questions || !$questions->count()) {
            return redirect()->route('practice-exam.create');
        }

        return view('test.show', compact('hash', 'questions'));
    }

    /**
     * @param TestRequest $request
     * @param string $hash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function store(
        TestRequest               $request,
        string                    $hash,
        GetQuestionsForHashAction $getQuestionsForHashAction,
        SaveTestAction            $saveTestAction,
    )
    {
        $submittedTestDTO = SubmittedTestDTO::fromRequest($request);
        $questions = $getQuestionsForHashAction($hash);

        if (!$questions || !$questions->count()) {
            return redirect()->route('practice-exam.create');
        }

        $saveTestAction($hash, $submittedTestDTO, $questions);

        return redirect()->route('practice-exam.result', ['hash' => $hash]);
    }

    /**
     * @param string $hash
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function result(string $hash)
    {
        $test = Test::query()
            ->where('hash', '=', $hash)
            ->firstOrFail();

        return view('test.result', compact(
            'hash',
            'test',
        ));
    }
}
