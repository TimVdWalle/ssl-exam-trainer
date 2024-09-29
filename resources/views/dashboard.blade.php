<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Hero -->
    <!-- Hero section -->
    <section class="fbg-gradient-to-b ffrom-gray-100 fto-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                    <h1 class="h1 mb-4" data-aos="zoom-y-out">Dashboard</h1>
                    <p class="text-xl text-gray-600" data-aos="zoom-y-out" data-aos-delay="150">
                        Resultaten voor {{auth()->user()->name}}
                    </p>
                </div>



                <hr>

                <!-- Items -->
                <div class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none mb-20" data-aos-id-blocks>
                    <x-dashboard-item
                        title="{{ round($metrics->correctlyAnsweredQuestions / $metrics->totalQuestions * 100, 0)}}%"
                        text="Globale vooruitgang"
                    />

                    <x-dashboard-item
                        title="{{ $metrics->averageScore }}%"
                        text="Gemiddelde score"
                    />

                    <x-dashboard-item
                        title="{{ $metrics->totalAnswers }}"
                        text="Vragen beantwoord"
                    />

                    <x-dashboard-item
                        title="{{ $metrics->totalTests }}"
                        text="Aantal tests"
                    />

                    <x-dashboard-item
                        title="{{ $metrics->totalTestsPassed }}"
                        text="Geslaagde tests"
                    />

                    <x-dashboard-item
                        title="{{ $metrics->passRate }}%"
                        text="Geslaagde tests"
                    />


                </div>

                <div class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-2 items-start md:max-w-2xl lg:max-w-none mb-20" data-aos-id-blocks>
                    <div style="">
                        <h1 class="text-3xl">Vooruitgang</h1>
                        <canvas id="myChart"></canvas>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script>
                        const ctx = document.getElementById('myChart');

                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! $metrics->progressOverTime->pluck('the_date') !!},
                                datasets: [{
                                    label: 'Score',
                                    data: {!! $metrics->progressOverTime->pluck('progress') !!},
                                    borderWidth: 1,
                                    lineTension: 0.5,
                                    fill: 'start'
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
