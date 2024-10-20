<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
    public \App\Models\Question $question;
    public int $iteration;
    public bool $showcorrect;

    public function __construct(\App\Models\Question $question, int $iteration, bool $showcorrect = false)
    {
        $this->question = $question;
        $this->iteration = $iteration;
        $this->showcorrect = $showcorrect;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question');
    }
}
