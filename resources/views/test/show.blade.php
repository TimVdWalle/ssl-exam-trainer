<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <!-- Career -->
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="py-12 md:py-20 border-t border-gray-200">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h2 class="h2 mb-4">Proefexamen</h2>
                    <p class="text-xl text-gray-600 text-left">
                        Dit is een proefexamen. 15 vragen werden geselecteerd uit een totaal van 196 vragen zoals die ook op het echte examen kunnen gevraagd worden.
                        Je moet 60% van de vragen juist hebben om geslaagd te zijn. Vragen overlaten wordt niet bestraft.
                    </p>
                </div>

                <!-- Questions list -->
                <div class="max-w-3xl mx-auto">
                    <form action="{{ route('practice-exam.store', ['hash' => $hash]) }}" method="POST">
                        @csrf

                        @foreach($questions as $question)
                            <x-question
                                :question="$question"
                                :iteration="$loop->iteration"
                            />
                        @endforeach

                        <div class="flex flex-col sm:flex-row justify-start max-w-xs mx-auto sm:max-w-md lg:mx-0">
                            <button type="submit" class="btn text-white bg-blue-600 hover:bg-blue-700 shadow">Verzenden</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const answers = document.querySelectorAll('.answer-label input[type="radio"]');

            answers.forEach(answer => {
                answer.addEventListener('change', function () {
                    // Remove selected class from all answers in the same question group
                    const name = this.name;
                    document.querySelectorAll(`input[name="${name}"]`).forEach(input => {
                        input.closest('.answer-label').classList.remove('selected');
                    });

                    // Add selected class to the clicked answer's label
                    if (this.checked) {
                        this.closest('.answer-label').classList.add('selected');
                    }
                });
            });
        });
    </script>


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
