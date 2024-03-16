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
                        <br />
                        Je moet 60% van de vragen juist hebben om geslaagd te zijn. Vragen overlaten wordt niet bestraft.
                    </p>
                </div>

                <!-- Questions list -->
                <div class="max-w-3xl mx-auto">
                    @foreach($questions as $question)
                        <x-question :question="$question" />
                    @endforeach
                </div>

            </div>
        </div>
    </section>


</x-app-layout>
