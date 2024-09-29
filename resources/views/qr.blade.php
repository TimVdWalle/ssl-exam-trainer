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
                    <h1 class="h1 mb-20">QR</h1>
                    <p class="text-xl text-gray-600 text-center content-center flex align-middle justify-center mt-20 flex">
                        {!! QrCode::size(300)->generate(url('/'), ) !!}
                    </p>
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
