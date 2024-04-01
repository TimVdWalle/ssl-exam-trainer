<?php

namespace App\Http\Controllers;

use App\Actions\CheckIfTestExistsForHash;
use App\Actions\CreateNewHashAction;
use App\Actions\GetQuestionsForHashAction;
use App\Actions\GetUserMetricsAction;
use App\Actions\SaveTestAction;
use App\Actions\SelectQuestionIdsAction;
use App\DTOs\SubmittedTestDTO;
use App\Http\Requests\TestRequest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * @throws \Exception
     */
    public function show(GetUserMetricsAction $getUserMetricsAction)
    {
        if (!Auth::check()) {
            abort(500);
        }

        /** @var int $userId */
        $userId = Auth::id();
        $metrics = $getUserMetricsAction($userId);

        return view('dashboard', compact('metrics'));
    }
}
