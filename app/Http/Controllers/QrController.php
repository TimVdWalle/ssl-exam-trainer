<?php

namespace App\Http\Controllers;

use App\Actions\CheckIfTestExistsForHash;
use App\Actions\CreateNewHashAction;
use App\Actions\GetQuestionsForHashAction;
use App\Actions\SaveTestAction;
use App\Actions\SelectQuestionIdsAction;
use App\DTOs\SubmittedTestDTO;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class QrController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        return view('qr');
    }
}
