<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Answer extends Component
{
    public \App\Models\Answer $answer;
    public bool $showcorrect;

    public function __construct(\App\Models\Answer $answer, bool $showcorrect = false)
    {
        $this->answer = $answer;
        $this->showcorrect = $showcorrect;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer');
    }
}
