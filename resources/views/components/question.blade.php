<div class="mb-20">

    <h3 class="h4 mb-8">
        <span class="question-number">#{{$iteration}}</span>
        {{$question->question}}

    </h3>
    <div class="-my-3">
        @foreach($question->answers as $answer)
            <x-answer
                :answer="$answer"
                :showcorrect="$showcorrect"
            />
        @endforeach
    </div>
    <span class="question-number">({{$question->number}})</span>
</div>
