<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Intro -->
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h1 class="h1 mb-4">Meest gemaakte fouten</h1>
{{--                    <p class="text-xl text-gray-600">--}}
{{--                        Dit is een proefexamen. {{config('ssl_exam_trainer.questions_per_test')}} vragen werden geselecteerd uit een totaal van {{\App\Models\Question::count() }} vragen zoals die ook op het echte examen kunnen gevraagd worden.--}}
{{--                        Je moet {{intval(config('ssl_exam_trainer.min_correct_to_pass') / config('ssl_exam_trainer.questions_per_test') * 100) }}% van de vragen juist hebben om geslaagd te zijn. Een vraag overlaten telt als een fout antwoord.--}}
{{--                    </p>--}}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="pb-12 md:pb-20">

                <div class="max-w-3xl mx-auto">
                        @foreach($wrongQuestions as $wrongQuestion)
                            <x-question
                                :question="$wrongQuestion"
                                :iteration="$loop->iteration"
                                :showcorrect="true"
                            />

                            <hr>

                        @endforeach
                </div>

            </div>
        </div>
    </section>

    <style>
        .selected,
        .selected:hover
        {
            background-color: #0071F4;
            color: white;
        }

        .answer-icon {
            color: rgb(37 99 235 / var(--tw-text-opacity));;
        }
        .selected .answer-icon {
            color: white;;
        }

        .answer-icon-selected {
            display: none;
        }

        .selected .answer-icon-selected {
            display: block;
        }
        .selected .answer-icon {
            display: none;
        }

        .question-number {
            color: #a9a9a9;
            padding-right: 5px;
        }
    </style>
</x-app-layout>
