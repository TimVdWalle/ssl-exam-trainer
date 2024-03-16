<div class="mb-20">
    <h3 class="h4 mb-8">{{$question->question}}</h3>

    <div class="-my-3">


        @foreach($question->answers as $answer)
            <x-answer :answer="$answer" />
        @endforeach

    </div>
</div>
