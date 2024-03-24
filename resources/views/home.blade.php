<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Hero -->
    <section class="relative">

        <!-- Illustration behind hero content -->
        <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1" aria-hidden="true">
            <svg width="1360" height="578" viewBox="0 0 1360 578" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="illustration-01">
                        <stop stop-color="#FFF" offset="0%" />
                        <stop stop-color="#EAEAEA" offset="77.402%" />
                        <stop stop-color="#DFDFDF" offset="100%" />
                    </linearGradient>
                </defs>
                <g fill="url(#illustration-01)" fill-rule="evenodd">
                    <circle cx="1232" cy="128" r="128" />
                    <circle cx="155" cy="443" r="64" />
                </g>
            </svg>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <!-- Hero content -->
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                <!-- Section header -->
                <div class="text-center pb-12 md:pb-16">
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tighter tracking-tighter mb-4" data-aos="zoom-y-out">Oefenen voor je <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400"> sportschutterslicentie</span> theoretisch examen</h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="md:text-center text-xl text-gray-600 mb-8" data-aos="zoom-y-out" data-aos-delay="150">
                            Via deze site kan je gemakkelijk en gratis oefenen
                            <br class="hidden md:block" />voor je sportschutterslicentie theorie-examen.
                        </p>
                        <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center" data-aos="zoom-y-out" data-aos-delay="300">
                            <div>
                                <a class="btn text-white bg-blue-600 hover:bg-blue-700 w-full mb-4 sm:w-auto sm:mb-0" href="{{ route('practice-exam.create') }}">Start test</a>
                            </div>
{{--                            <div>--}}
{{--                                <a class="btn text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4" href="#0">Learn more</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
