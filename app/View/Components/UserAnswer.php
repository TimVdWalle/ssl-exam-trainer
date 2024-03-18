<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserAnswer extends Component
{
    public \App\Models\UserAnswer $userAnswer;
    public int $iteration;

    /**
     * Create a new component instance.
     */
    public function __construct(\App\Models\UserAnswer $userAnswer, int $iteration)
    {

        $this->userAnswer = $userAnswer;
        $this->iteration = $iteration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-answer');
    }
}
