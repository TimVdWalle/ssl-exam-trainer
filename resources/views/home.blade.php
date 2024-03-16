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
                    <h1 class="text-5xl md:text-6xl font-extrabold leading-tighter tracking-tighter mb-4" data-aos="zoom-y-out">Oefenen voor je <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400"> sportschutterslicentie</span> theoretisch examen</h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-xl text-gray-600 mb-8" data-aos="zoom-y-out" data-aos-delay="150">
                            Via deze site kan je gemakkelijk en gratis oefenen
                            <br />voor je sportschutterslicentie theorie-examen.
                        </p>
                        <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center" data-aos="zoom-y-out" data-aos-delay="300">
                            <div>
                                <a class="btn text-white bg-blue-600 hover:bg-blue-700 w-full mb-4 sm:w-auto sm:mb-0" href="{{ route('practice-exam.show') }}">Start test</a>
                            </div>
{{--                            <div>--}}
{{--                                <a class="btn text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4" href="#0">Learn more</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <!-- Hero image -->
{{--                <div x-data="{ modalExpanded: false }">--}}
{{--                    <div class="relative flex justify-center mb-8" data-aos="zoom-y-out" data-aos-delay="450">--}}
{{--                        <div class="flex flex-col justify-center">--}}
{{--                            <img class="mx-auto rounded shadow-xl" src="./images/hero-image-01.png" width="768" height="432" alt="Hero" />--}}
{{--                            <svg class="absolute inset-0 max-w-full mx-auto md:max-w-none h-auto" width="768" height="432" viewBox="0 0 768 432" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                <defs>--}}
{{--                                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="hero-ill-a">--}}
{{--                                        <stop stop-color="#FFF" offset="0%" />--}}
{{--                                        <stop stop-color="#EAEAEA" offset="77.402%" />--}}
{{--                                        <stop stop-color="#DFDFDF" offset="100%" />--}}
{{--                                    </linearGradient>--}}
{{--                                    <linearGradient x1="50%" y1="0%" x2="50%" y2="99.24%" id="hero-ill-b">--}}
{{--                                        <stop stop-color="#FFF" offset="0%" />--}}
{{--                                        <stop stop-color="#EAEAEA" offset="48.57%" />--}}
{{--                                        <stop stop-color="#DFDFDF" stop-opacity="0" offset="100%" />--}}
{{--                                    </linearGradient>--}}
{{--                                    <radialGradient cx="21.152%" cy="86.063%" fx="21.152%" fy="86.063%" r="79.941%" id="hero-ill-e">--}}
{{--                                        <stop stop-color="#4FD1C5" offset="0%" />--}}
{{--                                        <stop stop-color="#81E6D9" offset="25.871%" />--}}
{{--                                        <stop stop-color="#338CF5" offset="100%" />--}}
{{--                                    </radialGradient>--}}
{{--                                    <circle id="hero-ill-d" cx="384" cy="216" r="64" />--}}
{{--                                </defs>--}}
{{--                                <g fill="none" fill-rule="evenodd">--}}
{{--                                    <circle fill-opacity=".04" fill="url(#hero-ill-a)" cx="384" cy="216" r="128" />--}}
{{--                                    <circle fill-opacity=".16" fill="url(#hero-ill-b)" cx="384" cy="216" r="96" />--}}
{{--                                    <g fill-rule="nonzero">--}}
{{--                                        <use fill="#000" xlink:href="#hero-ill-d" />--}}
{{--                                        <use fill="url(#hero-ill-e)" xlink:href="#hero-ill-d" />--}}
{{--                                    </g>--}}
{{--                                </g>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <button class="absolute top-full flex items-center transform -translate-y-1/2 bg-white rounded-full font-medium group p-4 shadow-lg" @click.prevent="modalExpanded = true" aria-controls="modal">--}}
{{--                            <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-blue-600 shrink-0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0 2C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12z" />--}}
{{--                                <path d="M10 17l6-5-6-5z" />--}}
{{--                            </svg>--}}
{{--                            <span class="ml-3">Watch the full video (2 min)</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <!-- Modal backdrop -->--}}
{{--                    <div--}}
{{--                        class="fixed inset-0 z-50 bg-white bg-opacity-75 transition-opacity backdrop-blur-sm"--}}
{{--                        x-show="modalExpanded"--}}
{{--                        x-transition:enter="transition ease-out duration-200"--}}
{{--                        x-transition:enter-start="opacity-0"--}}
{{--                        x-transition:enter-end="opacity-100"--}}
{{--                        x-transition:leave="transition ease-out duration-100"--}}
{{--                        x-transition:leave-start="opacity-100"--}}
{{--                        x-transition:leave-end="opacity-0"--}}
{{--                        aria-hidden="true"--}}
{{--                        x-cloak--}}
{{--                    ></div>--}}

{{--                    <!-- Modal dialog -->--}}
{{--                    <div--}}
{{--                        id="modal"--}}
{{--                        class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center transform px-4 sm:px-6"--}}
{{--                        role="dialog"--}}
{{--                        aria-modal="true"--}}
{{--                        aria-labelledby="modal-headline"--}}
{{--                        x-show="modalExpanded"--}}
{{--                        x-transition:enter="transition ease-out duration-200"--}}
{{--                        x-transition:enter-start="opacity-0 scale-95"--}}
{{--                        x-transition:enter-end="opacity-100 scale-100"--}}
{{--                        x-transition:leave="transition ease-out duration-200"--}}
{{--                        x-transition:leave-start="opacity-100 scale-100"--}}
{{--                        x-transition:leave-end="opacity-0 scale-95"--}}
{{--                        x-cloak--}}
{{--                    >--}}
{{--                        <div class="bg-white overflow-auto max-w-6xl w-full max-h-full" @click.outside="modalExpanded = false" @keydown.escape.window="modalExpanded = false">--}}
{{--                            <div class="relative pb-9/16">--}}
{{--                                <video x-init="$watch('modalExpanded', value => value ? $el.play() : $el.pause())" class="absolute w-full h-full" width="1920" height="1080" loop controls>--}}
{{--                                    <source src="./videos/video.mp4" type="video/mp4" />--}}
{{--                                    Your browser does not support the video tag.--}}
{{--                                </video>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

            </div>

        </div>
    </section>

{{--    <!-- Features -->--}}
{{--    <section class="relative">--}}

{{--        <!-- Section background (needs .relative class on parent and next sibling elements) -->--}}
{{--        <div class="absolute inset-0 bg-gray-100 pointer-events-none mb-16" aria-hidden="true"></div>--}}
{{--        <div class="absolute left-0 right-0 m-auto w-px p-px h-20 bg-gray-200 transform -translate-y-1/2"></div>--}}

{{--        <div class="relative max-w-6xl mx-auto px-4 sm:px-6">--}}
{{--            <div class="pt-12 md:pt-20">--}}

{{--                <!-- Section header -->--}}
{{--                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">--}}
{{--                    <h1 class="h2 mb-4">How Simple works</h1>--}}
{{--                    <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.</p>--}}
{{--                </div>--}}

{{--                <!-- Top image -->--}}
{{--                <div class="pb-12 md:pb-16">--}}
{{--                    <img src="./images/features-top-image.png" width="1104" height="325" alt="Features top" />--}}
{{--                </div>--}}

{{--                <!-- Section content -->--}}
{{--                <div class="md:grid md:grid-cols-12 md:gap-6" x-data="{ tab: '1' }">--}}

{{--                    <!-- Content -->--}}
{{--                    <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-7 lg:col-span-6 md:mt-6">--}}
{{--                        <div class="md:pr-4 lg:pr-12 xl:pr-16 mb-8">--}}
{{--                            <h3 class="h3 mb-3">Powerful suite of tools</h3>--}}
{{--                            <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>--}}
{{--                        </div>--}}
{{--                        <!-- Tabs buttons -->--}}
{{--                        <div class="mb-8 md:mb-0">--}}
{{--                            <button--}}
{{--                                :class="tab !== '1' ? 'bg-white shadow-md border-gray-200 hover:shadow-lg' : 'bg-gray-200 border-transparent'"--}}
{{--                                class="text-left flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out mb-3"--}}
{{--                                @click.prevent--}}
{{--                                @click="tab = '1'"--}}
{{--                            >--}}
{{--                                <div>--}}
{{--                                    <div class="font-bold leading-snug tracking-tight mb-1">Building the Simple ecosystem</div>--}}
{{--                                    <div class="text-gray-600">Take collaboration to the next level with security and administrative features built for teams.</div>--}}
{{--                                </div>--}}
{{--                                <div class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow shrink-0 ml-3">--}}
{{--                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M11.953 4.29a.5.5 0 00-.454-.292H6.14L6.984.62A.5.5 0 006.12.173l-6 7a.5.5 0 00.379.825h5.359l-.844 3.38a.5.5 0 00.864.445l6-7a.5.5 0 00.075-.534z" />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                            <button--}}
{{--                                :class="tab !== '2' ? 'bg-white shadow-md border-gray-200 hover:shadow-lg' : 'bg-gray-200 border-transparent'"--}}
{{--                                class="text-left flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out mb-3"--}}
{{--                                @click.prevent--}}
{{--                                @click="tab = '2'"--}}
{{--                            >--}}
{{--                                <div>--}}
{{--                                    <div class="font-bold leading-snug tracking-tight mb-1">Building the Simple ecosystem</div>--}}
{{--                                    <div class="text-gray-600">Take collaboration to the next level with security and administrative features built for teams.</div>--}}
{{--                                </div>--}}
{{--                                <div class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow shrink-0 ml-3">--}}
{{--                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z" fill-rule="nonzero" />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                            <button--}}
{{--                                :class="tab !== '3' ? 'bg-white shadow-md border-gray-200 hover:shadow-lg' : 'bg-gray-200 border-transparent'"--}}
{{--                                class="text-left flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out"--}}
{{--                                @click.prevent--}}
{{--                                @click="tab = '3'"--}}
{{--                            >--}}
{{--                                <div>--}}
{{--                                    <div class="font-bold leading-snug tracking-tight mb-1">Building the Simple ecosystem</div>--}}
{{--                                    <div class="text-gray-600">Take collaboration to the next level with security and administrative features built for teams.</div>--}}
{{--                                </div>--}}
{{--                                <div class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow shrink-0 ml-3">--}}
{{--                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M11.334 8.06a.5.5 0 00-.421-.237 6.023 6.023 0 01-5.905-6c0-.41.042-.82.125-1.221a.5.5 0 00-.614-.586 6 6 0 106.832 8.529.5.5 0 00-.017-.485z" fill="#191919" fill-rule="nonzero" />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Tabs items -->--}}
{{--                    <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-5 lg:col-span-6 mb-8 md:mb-0 md:order-1" data-aos="zoom-y-out">--}}
{{--                        <div class="relative flex flex-col text-center lg:text-right">--}}
{{--                            <!-- Item 1 -->--}}
{{--                            <div--}}
{{--                                class="w-full"--}}
{{--                                x-show="tab === '1'"--}}
{{--                                x-transition:enter="transition ease-in-out duration-700 transform order-first"--}}
{{--                                x-transition:enter-start="opacity-0 translate-y-16"--}}
{{--                                x-transition:enter-end="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave="transition ease-in-out duration-300 transform absolute"--}}
{{--                                x-transition:leave-start="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave-end="opacity-0 -translate-y-16"--}}
{{--                            >--}}
{{--                                <div class="relative inline-flex flex-col">--}}
{{--                                    <img class="md:max-w-none mx-auto rounded" src="./images/features-home-bg-01.png" width="500" height="375" alt="Features bg" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float" src="./images/features-home-element-01.png" width="500" height="147" alt="Element 01" style="top:22%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float animation-delay-500" src="./images/features-home-element-02.png" width="500" height="158" alt="Element 02" style="top:39%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 bottom-0 transform animate-float animation-delay-1000" src="./images/features-home-element-03.png" width="500" height="167" alt="Element 03" style="top:77%" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Item 2 -->--}}
{{--                            <div--}}
{{--                                class="w-full"--}}
{{--                                x-show="tab === '2'"--}}
{{--                                x-transition:enter="transition ease-in-out duration-700 transform order-first"--}}
{{--                                x-transition:enter-start="opacity-0 translate-y-16"--}}
{{--                                x-transition:enter-end="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave="transition ease-in-out duration-300 transform absolute"--}}
{{--                                x-transition:leave-start="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave-end="opacity-0 -translate-y-16"--}}
{{--                            >--}}
{{--                                <div class="relative inline-flex flex-col">--}}
{{--                                    <img class="md:max-w-none mx-auto rounded" src="./images/features-home-bg-01.png" width="500" height="375" alt="Features bg" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 bottom-0 transform animate-float animation-delay-1000" src="./images/features-home-element-03.png" width="500" height="167" alt="Element 03" style="top:18%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float animation-delay-500" src="./images/features-home-element-02.png" width="500" height="158" alt="Element 02" style="top:40%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float" src="./images/features-home-element-01.png" width="500" height="147" alt="Element 01" style="top:79%" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Item 3 -->--}}
{{--                            <div--}}
{{--                                class="w-full"--}}
{{--                                x-show="tab === '3'"--}}
{{--                                x-transition:enter="transition ease-in-out duration-700 transform order-first"--}}
{{--                                x-transition:enter-start="opacity-0 translate-y-16"--}}
{{--                                x-transition:enter-end="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave="transition ease-in-out duration-300 transform absolute"--}}
{{--                                x-transition:leave-start="opacity-100 translate-y-0"--}}
{{--                                x-transition:leave-end="opacity-0 -translate-y-16"--}}
{{--                            >--}}
{{--                                <div class="relative inline-flex flex-col">--}}
{{--                                    <img class="md:max-w-none mx-auto rounded" src="./images/features-home-bg-01.png" width="500" height="375" alt="Features bg" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float" src="./images/features-home-element-01.png" width="500" height="147" alt="Element 01" style="top:22%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 transform animate-float animation-delay-500" src="./images/features-home-element-02.png" width="500" height="158" alt="Element 02" style="top:39%" />--}}
{{--                                    <img class="md:max-w-none absolute w-full left-0 bottom-0 transform animate-float animation-delay-1000" src="./images/features-home-element-03.png" width="500" height="167" alt="Element 03" style="top:77%" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- Features blocks -->--}}
{{--    <section class="relative">--}}

{{--        <!-- Section background (needs .relative class on parent and next sibling elements) -->--}}
{{--        <div class="absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-900 pointer-events-none" aria-hidden="true"></div>--}}
{{--        <div class="absolute left-0 right-0 bottom-0 m-auto w-px p-px h-20 bg-gray-200 transform translate-y-1/2"></div>--}}

{{--        <div class="relative max-w-6xl mx-auto px-4 sm:px-6">--}}
{{--            <div class="py-12 md:py-20">--}}

{{--                <!-- Section header -->--}}
{{--                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">--}}
{{--                    <h2 class="h2 mb-4">Explore the solutions</h2>--}}
{{--                    <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.</p>--}}
{{--                </div>--}}

{{--                <!-- Items -->--}}
{{--                <div class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none">--}}

{{--                    <!-- 1st item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2">--}}
{{--                                    <path class="stroke-current text-blue-300" d="M34.514 35.429l2.057 2.285h8M20.571 26.286h5.715l2.057 2.285" />--}}
{{--                                    <path class="stroke-current text-white" d="M20.571 37.714h5.715L36.57 26.286h8" />--}}
{{--                                    <path class="stroke-current text-blue-300" stroke-linecap="square" d="M41.143 34.286l3.428 3.428-3.428 3.429" />--}}
{{--                                    <path class="stroke-current text-white" stroke-linecap="square" d="M41.143 29.714l3.428-3.428-3.428-3.429" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                    <!-- 2nd item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2" transform="translate(19.429 20.571)">--}}
{{--                                    <circle class="stroke-current text-white" stroke-linecap="square" cx="12.571" cy="12.571" r="1.143" />--}}
{{--                                    <path class="stroke-current text-white" d="M19.153 23.267c3.59-2.213 5.99-6.169 5.99-10.696C25.143 5.63 19.514 0 12.57 0 5.63 0 0 5.629 0 12.571c0 4.527 2.4 8.483 5.99 10.696" />--}}
{{--                                    <path class="stroke-current text-blue-300" d="M16.161 18.406a6.848 6.848 0 003.268-5.835 6.857 6.857 0 00-6.858-6.857 6.857 6.857 0 00-6.857 6.857 6.848 6.848 0 003.268 5.835" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                    <!-- 3rd item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2">--}}
{{--                                    <path class="stroke-current text-blue-300" d="M34.743 29.714L36.57 32 27.43 43.429H24M24 20.571h3.429l1.828 2.286" />--}}
{{--                                    <path class="stroke-current text-white" stroke-linecap="square" d="M34.743 41.143l1.828 2.286H40M40 20.571h-3.429L27.43 32l1.828 2.286" />--}}
{{--                                    <path class="stroke-current text-blue-300" d="M36.571 32H40" />--}}
{{--                                    <path class="stroke-current text-white" d="M24 32h3.429" stroke-linecap="square" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                    <!-- 4th item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2">--}}
{{--                                    <path class="stroke-current text-white" d="M32 37.714A5.714 5.714 0 0037.714 32a5.714 5.714 0 005.715 5.714" />--}}
{{--                                    <path class="stroke-current text-white" d="M32 37.714a5.714 5.714 0 015.714 5.715 5.714 5.714 0 015.715-5.715M20.571 26.286a5.714 5.714 0 005.715-5.715A5.714 5.714 0 0032 26.286" />--}}
{{--                                    <path class="stroke-current text-white" d="M20.571 26.286A5.714 5.714 0 0126.286 32 5.714 5.714 0 0132 26.286" />--}}
{{--                                    <path class="stroke-current text-blue-300" d="M21.714 40h4.572M24 37.714v4.572M37.714 24h4.572M40 21.714v4.572" stroke-linecap="square" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                    <!-- 5th item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2">--}}
{{--                                    <path class="stroke-current text-white" d="M19.429 32a12.571 12.571 0 0021.46 8.89L23.111 23.11A12.528 12.528 0 0019.429 32z" />--}}
{{--                                    <path class="stroke-current text-blue-300" d="M32 19.429c6.943 0 12.571 5.628 12.571 12.571M32 24a8 8 0 018 8" />--}}
{{--                                    <path class="stroke-current text-white" d="M34.286 29.714L32 32" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                    <!-- 6th item -->--}}
{{--                    <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">--}}
{{--                        <svg class="w-16 h-16 p-1 -mt-1 mb-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g fill="none" fill-rule="evenodd">--}}
{{--                                <rect class="fill-current text-blue-600" width="64" height="64" rx="32" />--}}
{{--                                <g stroke-width="2" stroke-linecap="square">--}}
{{--                                    <path class="stroke-current text-white" d="M29.714 40.358l-4.777 2.51 1.349-7.865-5.715-5.57 7.898-1.147L32 21.13l3.531 7.155 7.898 1.147L40 32.775" />--}}
{{--                                    <path class="stroke-current text-blue-300" d="M44.571 43.429H34.286M44.571 37.714H34.286" />--}}
{{--                                </g>--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Headless CMS</h4>--}}
{{--                        <p class="text-gray-600 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- Features world -->--}}
{{--    <section>--}}
{{--        <div class="max-w-6xl mx-auto px-4 sm:px-6">--}}
{{--            <div class="py-12 md:py-20">--}}

{{--                <!-- Section header -->--}}
{{--                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">--}}
{{--                    <h1 class="h2 mb-4">Simple can help you scale internationally</h1>--}}
{{--                    <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.</p>--}}
{{--                </div>--}}

{{--                <!-- World illustration -->--}}
{{--                <div class="flex flex-col items-center pt-12 md:pt-16">--}}
{{--                    <div class="relative">--}}
{{--                        <!-- Halo effect -->--}}
{{--                        <svg class="absolute inset-0 left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none" width="800" height="800" viewBox="0 0 800 800" style="max-width: 200%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g class="fill-current text-gray-400 opacity-75">--}}
{{--                                <circle class="pulse" cx="400" cy="400" r="200" />--}}
{{--                                <circle class="pulse pulse-1" cx="400" cy="400" r="200" />--}}
{{--                                <circle class="pulse pulse-2" cx="400" cy="400" r="200" />--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <!-- Globe image -->--}}
{{--                        <img class="relative rounded-full shadow-xl" src="./images/planet.png" width="400" height="400" alt="Planet" />--}}
{{--                        <!-- Static dots -->--}}
{{--                        <svg class="absolute top-0 w-full h-auto" viewBox="0 0 400 400" style="left: 12%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <defs>--}}
{{--                                <filter x="-41.7%" y="-34.2%" width="183.3%" height="185.6%" filterUnits="objectBoundingBox" id="world-ill-a">--}}
{{--                                    <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1" />--}}
{{--                                    <feGaussianBlur stdDeviation="6" in="shadowOffsetOuter1" result="shadowBlurOuter1" />--}}
{{--                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0" in="shadowBlurOuter1" />--}}
{{--                                </filter>--}}
{{--                                <filter x="-83.3%" y="-68.5%" width="266.7%" height="271.2%" filterUnits="objectBoundingBox" id="world-ill-c">--}}
{{--                                    <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1" />--}}
{{--                                    <feGaussianBlur stdDeviation="6" in="shadowOffsetOuter1" result="shadowBlurOuter1" />--}}
{{--                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0" in="shadowBlurOuter1" />--}}
{{--                                </filter>--}}
{{--                                <filter x="-7.3%" y="-23.8%" width="114.5%" height="147.6%" filterUnits="objectBoundingBox" id="world-ill-e">--}}
{{--                                    <feGaussianBlur stdDeviation="2" in="SourceGraphic" />--}}
{{--                                </filter>--}}
{{--                                <ellipse id="world-ill-b" cx="51" cy="175.402" rx="24" ry="23.364" />--}}
{{--                                <ellipse id="world-ill-d" cx="246" cy="256.201" rx="12" ry="11.682" />--}}
{{--                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="world-ill-f">--}}
{{--                                    <stop stop-color="#0070F4" stop-opacity="0" offset="0%" />--}}
{{--                                    <stop stop-color="#0070F4" stop-opacity=".64" offset="52.449%" />--}}
{{--                                    <stop stop-color="#0070F4" stop-opacity="0" offset="100%" />--}}
{{--                                </linearGradient>--}}
{{--                            </defs>--}}
{{--                            <g transform="translate(0 -.818)" fill="none" fill-rule="evenodd">--}}
{{--                                <use fill="#000" filter="url(#world-ill-a)" xlink:href="#world-ill-b" />--}}
{{--                                <use fill="#0070F4" xlink:href="#world-ill-b" />--}}
{{--                                <use fill="#000" filter="url(#world-ill-c)" xlink:href="#world-ill-d" />--}}
{{--                                <use fill="#0070F4" xlink:href="#world-ill-d" />--}}
{{--                                <ellipse fill-opacity=".32" fill="#0070F4" cx="293" cy="142.303" rx="8" ry="7.788" />--}}
{{--                                <ellipse fill-opacity=".64" fill="#0070F4" cx="250" cy="187.083" rx="6" ry="5.841" />--}}
{{--                                <ellipse fill-opacity=".64" fill="#0070F4" cx="13" cy="233.811" rx="2" ry="1.947" />--}}
{{--                                <ellipse fill="#0070F4" cx="29" cy="114.072" rx="2" ry="1.947" />--}}
{{--                                <path d="M258 256.2l87-29.204" stroke="#666" stroke-width="2" opacity=".16" filter="url(#world-ill-e)" />--}}
{{--                                <path d="M258 251.333c111.333-40.237 141-75.282 89-105.136M136 103.364c66.667 4.543 104.667 32.45 114 83.72" stroke="url(#world-ill-f)" stroke-width="2" stroke-dasharray="2" />--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <!-- Dynamic dots -->--}}
{{--                        <svg class="absolute max-w-full" width="48" height="48" viewBox="0 0 48 48" style="width: 12%;top: 45%; left: 50%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g class="fill-current text-blue-600">--}}
{{--                                <circle class="pulse pulse-mini pulse-1" cx="24" cy="24" r="8" />--}}
{{--                                <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8" />--}}
{{--                                <circle cx="24" cy="24" r="8" />--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <svg class="absolute max-w-full" width="48" height="48" viewBox="0 0 48 48" style="width: 12%;top: 19%; left: 46%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <g class="fill-current text-blue-600">--}}
{{--                                <circle class="pulse pulse-mini" cx="24" cy="24" r="8" />--}}
{{--                                <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8" />--}}
{{--                                <circle cx="24" cy="24" r="8" />--}}
{{--                            </g>--}}
{{--                        </svg>--}}
{{--                        <!-- Avatars -->--}}
{{--                        <img class="absolute max-w-full transform animate-float" src="./images/planet-avatar-01.png" width="261" height="105" alt="Planet avatar 01" style="width: 65.25%; top: -3%; right: -27%;" />--}}
{{--                        <img class="absolute max-w-full transform animate-float animation-delay-1000" src="./images/planet-avatar-02.png" width="355" height="173" alt="Planet avatar 02" style="width: 88.7%; bottom: -20%; right: -18%;" />--}}
{{--                        <!-- Black icon -->--}}
{{--                        <svg class="absolute top-0 max-w-full w-20 h-auto rounded-full shadow-xl" viewBox="0 0 80 80" style="width: 20%; left: 6%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <circle class="fill-current text-gray-800" cx="40" cy="40" r="40" />--}}
{{--                            <path class="stroke-current text-white" d="M30.19 41.221c7.074 3.299 12.957-4.7 20.03-1.401l1.769.824-1.419-3.883M43.988 50.877l3.887-1.41-1.769-.824c-2.19-1.021-3.475-2.651-4.42-4.512M38.724 36.91c-.944-1.86-2.23-3.49-4.42-4.512" stroke-linecap="square" stroke-width="2" />--}}
{{--                        </svg>--}}
{{--                        <!-- Blue icon -->--}}
{{--                        <svg class="absolute max-w-full w-16 h-auto rounded-full shadow-xl" viewBox="0 0 64 64" style="width: 16%; top: 32%; left: -27%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <circle class="fill-current text-blue-600" cx="32" cy="32" r="32" />--}}
{{--                            <path class="stroke-current text-white" d="M20.733 31.416l18.127-8.452M43.039 31.926L24.913 40.38" stroke-width="2" fill="none" />--}}
{{--                            <path class="stroke-current text-white" stroke-linecap="square" d="M32.238 20.595l6.622 2.369-2.442 6.594M31.534 42.747l-6.621-2.368 2.442-6.595" stroke-width="2" fill="none" />--}}
{{--                        </svg>--}}
{{--                        <!-- White icon -->--}}
{{--                        <svg class="absolute max-w-full w-16 h-auto rounded-full shadow-xl" viewBox="0 0 64 64" style="width: 16%; top: 55%; right: -16%;" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <circle class="fill-current text-gray-100" fill="#FBFBFB" cx="32" cy="32" r="32" />--}}
{{--                            <path class="fill-current text-gray-700" d="M37.11 32.44l-1.69 4.646-8.458-3.078.676-1.859-4.773 1.42 2.744 4.156.677-1.858 9.396 3.42a.994.994 0 001.278-.587l2.03-5.576-1.88-.684zM27.037 30.878l1.691-4.646 8.457 3.078-.676 1.858 4.773-1.42-2.744-4.155-.676 1.858-9.397-3.42a.994.994 0 00-1.278.587l-2.03 5.576 1.88.684z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- News -->--}}
{{--    <section>--}}
{{--        <div class="max-w-6xl mx-auto px-4 sm:px-6">--}}
{{--            <div class="py-12 md:py-20">--}}

{{--                <!-- Section header -->--}}
{{--                <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">--}}
{{--                    <h2 class="h2">The most innovative businesses choose Simple</h2>--}}
{{--                </div>--}}

{{--                <!-- Categories -->--}}
{{--                <div class="mb-12 md:mb-16">--}}
{{--                    <ul class="flex flex-wrap justify-center text-sm font-medium -m-2">--}}
{{--                        <li class="m-2">--}}
{{--                            <a class="inline-flex text-center text-gray-100 py-2 px-4 rounded-full bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out" href="#0">Developers</a>--}}
{{--                        </li>--}}
{{--                        <li class="m-2">--}}
{{--                            <a class="inline-flex text-center text-gray-800 py-2 px-4 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">SaaS</a>--}}
{{--                        </li>--}}
{{--                        <li class="m-2">--}}
{{--                            <a class="inline-flex text-center text-gray-800 py-2 px-4 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">Web Agencies</a>--}}
{{--                        </li>--}}
{{--                        <li class="m-2">--}}
{{--                            <a class="inline-flex text-center text-gray-800 py-2 px-4 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">E-Commerce</a>--}}
{{--                        </li>--}}
{{--                        <li class="m-2">--}}
{{--                            <a class="inline-flex text-center text-gray-800 py-2 px-4 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">Startups</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <!-- Articles list -->--}}
{{--                <div class="max-w-sm mx-auto md:max-w-none">--}}
{{--                    <div class="grid gap-12 md:grid-cols-3 md:gap-x-6 md:gap-y-8 items-start">--}}

{{--                        <!-- 1st article -->--}}
{{--                        <article class="flex flex-col h-full" data-aos="zoom-y-out">--}}
{{--                            <header>--}}
{{--                                <a class="block mb-6" href="blog-post.html">--}}
{{--                                    <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">--}}
{{--                                        <img class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out" src="./images/news-01.jpg" width="352" height="198" alt="News 01" />--}}
{{--                                    </figure>--}}
{{--                                </a>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <ul class="flex flex-wrap text-xs font-medium -m-1">--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0">Case studies</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-800 py-1 px-3 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">Hubspot</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <h3 class="text-xl font-bold leading-snug tracking-tight">--}}
{{--                                    <a class="hover:underline" href="blog-post.html">“How HubSpot saved 25% on developing costs by switching to Simple.”</a>--}}
{{--                                </h3>--}}
{{--                            </header>--}}
{{--                            <footer class="text-sm flex items-center mt-4">--}}
{{--                                <div class="flex shrink-0 mr-3">--}}
{{--                                    <a class="relative" href="#0">--}}
{{--                                        <span class="absolute inset-0 -m-px" aria-hidden="true"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>--}}
{{--                                        <img class="relative rounded-full" src="./images/news-author-01.jpg" width="32" height="32" alt="Author 01" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="text-gray-600">By </span>--}}
{{--                                    <a class="font-medium hover:underline" href="#0">Lisa Allison</a>--}}
{{--                                </div>--}}
{{--                            </footer>--}}
{{--                        </article>--}}

{{--                        <!-- 2nd article -->--}}
{{--                        <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="150">--}}
{{--                            <header>--}}
{{--                                <a class="block mb-6" href="blog-post.html">--}}
{{--                                    <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">--}}
{{--                                        <img class="absolute inset-0 w-full h-full object-cover transform scale-105 translate-z-0 hover:-translate-y-1 transition duration-700 ease-out" src="./images/news-02.jpg" width="352" height="198" alt="News 02" />--}}
{{--                                    </figure>--}}
{{--                                </a>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <ul class="flex flex-wrap text-xs font-medium -m-1">--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0">Case studies</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-800 py-1 px-3 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">Facebook</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <h3 class="text-xl font-bold leading-snug tracking-tight">--}}
{{--                                    <a class="hover:underline" href="blog-post.html">“How Facebook brought 13% cost savings to their bottom line with Simple’s products.”</a>--}}
{{--                                </h3>--}}
{{--                            </header>--}}
{{--                            <footer class="text-sm flex items-center mt-4">--}}
{{--                                <div class="flex shrink-0 mr-3">--}}
{{--                                    <a class="relative -ml-2" href="#0">--}}
{{--                                        <span class="absolute inset-0 -m-px" aria-hidden="true"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>--}}
{{--                                        <img class="relative rounded-full" src="./images/news-author-02.jpg" width="32" height="32" alt="Author 02" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="text-gray-600">By </span>--}}
{{--                                    <a class="font-medium hover:underline" href="#0">Knut Mayer</a>--}}
{{--                                </div>--}}
{{--                            </footer>--}}
{{--                        </article>--}}

{{--                        <!-- 3rd article -->--}}
{{--                        <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="300">--}}
{{--                            <header>--}}
{{--                                <a class="block mb-6" href="blog-post.html">--}}
{{--                                    <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">--}}
{{--                                        <img class="absolute inset-0 w-full h-full object-cover transform scale-105 translate-z-0 hover:-translate-y-1 transition duration-700 ease-out" src="./images/news-03.jpg" width="352" height="198" alt="News 03" />--}}
{{--                                    </figure>--}}
{{--                                </a>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <ul class="flex flex-wrap text-xs font-medium -m-1">--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0">Case studies</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="m-1">--}}
{{--                                            <a class="inline-flex text-center text-gray-800 py-1 px-3 rounded-full bg-white hover:bg-gray-100 shadow-sm transition duration-150 ease-in-out" href="#0">Tinder</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <h3 class="text-xl font-bold leading-snug tracking-tight">--}}
{{--                                    <a class="hover:underline" href="blog-post.html">“How Tinder grew 115% and saved 120 Hours each week by outsourcing to Simple.”</a>--}}
{{--                                </h3>--}}
{{--                            </header>--}}
{{--                            <footer class="text-sm flex items-center mt-4">--}}
{{--                                <div class="flex shrink-0 mr-3">--}}
{{--                                    <a class="relative" href="#0">--}}
{{--                                        <span class="absolute inset-0 -m-px" aria-hidden="true"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>--}}
{{--                                        <img class="relative rounded-full" src="./images/news-author-01.jpg" width="32" height="32" alt="Author 01" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <span class="text-gray-600">By </span>--}}
{{--                                    <a class="font-medium hover:underline" href="#0">Lisa Allison</a>--}}
{{--                                </div>--}}
{{--                            </footer>--}}
{{--                        </article>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- Cta -->--}}
{{--    <section>--}}
{{--        <div class="max-w-6xl mx-auto px-4 sm:px-6">--}}
{{--            <div class="pb-12 md:pb-20">--}}

{{--                <!-- CTA box -->--}}
{{--                <div class="bg-blue-600 rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl" data-aos="zoom-y-out">--}}

{{--                    <div class="flex flex-col lg:flex-row justify-between items-center">--}}

{{--                        <!-- CTA content -->--}}
{{--                        <div class="mb-6 lg:mr-16 lg:mb-0 text-center lg:text-left">--}}
{{--                            <h3 class="h3 text-white mb-2">Ready to get started?</h3>--}}
{{--                            <p class="text-white text-lg opacity-75">We have a generous free tier available to get you started right away.</p>--}}
{{--                        </div>--}}

{{--                        <!-- CTA button -->--}}
{{--                        <div>--}}
{{--                            <a class="btn text-blue-600 bg-gradient-to-r from-blue-100 to-white" href="#0">Get started for free</a>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
</x-app-layout>
