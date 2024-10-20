<header class="fixed w-full z-30 md:bg-opacity-90 transition duration-300 ease-in-out" x-data="handleHeader" @scroll.window="isTop" :class="{ 'bg-white backdrop-blur-sm shadow-lg' : !top }">
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('handleHeader', () => ({
                top: true,
                isTop() {
                    this.top = window.pageYOffset < 10
                },
                init() {
                    this.isTop()
                }
            }))
        })
    </script>
    <div class="max-w-6xl mx-auto px-5 sm:px-6">
        <div class="flex items-center justify-between h-16 md:h-20">

            <!-- Site branding -->
            <div class="shrink-0 mr-4">
                <!-- Logo -->
                <a class="block" href="{{ route('home') }}" aria-label="Cruip">
                    <svg class="w-8 h-8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <radialGradient cx="21.152%" cy="86.063%" fx="21.152%" fy="86.063%" r="79.941%" id="header-logo">
                                <stop stop-color="#4FD1C5" offset="0%" />
                                <stop stop-color="#81E6D9" offset="25.871%" />
                                <stop stop-color="#338CF5" offset="100%" />
                            </radialGradient>
                        </defs>
                        <rect width="32" height="32" rx="16" fill="url(#header-logo)" fill-rule="nonzero" />
                    </svg>
                </a>
            </div>

            <!-- Desktop navigation -->
            <nav class="hidden md:flex md:grow">

                <!-- Desktop menu links -->
                <ul class="flex grow justify-start flex-wrap items-center">
                    <li>
                        <a class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('practice-exam.create') }}">Start test</a>
                    </li>

                    @auth
                        <li>
                            <a class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('dashboard.show') }}">Dashboard</a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('wrong-questions.show') }}">Meest gemaakte fouten</a>
                        </li>
                    @endauth

                    <li>
                        <a class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('qr.show') }}">QR</a>
                    </li>

                    <!-- 1st level: hover -->
{{--                    <li--}}
{{--                        class="relative"--}}
{{--                        x-data="{ open: false }"--}}
{{--                        @mouseenter="open = true"--}}
{{--                        @mouseleave="open = false"--}}
{{--                    >--}}
{{--                        <a--}}
{{--                            class="text-gray-600 hover:text-gray-900 px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out"--}}
{{--                            href="#0"--}}
{{--                            aria-haspopup="true"--}}
{{--                            :aria-expanded="open"--}}
{{--                            @focus="open = true"--}}
{{--                            @focusout="open = false"--}}
{{--                            @click.prevent--}}
{{--                        >--}}
{{--                            Resources--}}
{{--                            <svg class="w-3 h-3 fill-current text-gray-400 cursor-pointer ml-1 shrink-0" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M10.28 4.305L5.989 8.598 1.695 4.305A1 1 0 00.28 5.72l5 5a1 1 0 001.414 0l5-5a1 1 0 10-1.414-1.414z" />--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                        <!-- 2nd level: hover -->--}}
{{--                        <ul--}}
{{--                            class="origin-top-right absolute top-full right-0 w-40 bg-white py-2 ml-4 rounded shadow-lg"--}}
{{--                            x-show="open"--}}
{{--                            x-transition:enter="transition ease-out duration-200 transform"--}}
{{--                            x-transition:enter-start="opacity-0 -translate-y-2"--}}
{{--                            x-transition:enter-end="opacity-100 translate-y-0"--}}
{{--                            x-transition:leave="transition ease-out duration-200"--}}
{{--                            x-transition:leave-start="opacity-100"--}}
{{--                            x-transition:leave-end="opacity-0"--}}
{{--                            x-cloak--}}
{{--                        >--}}
{{--                            <li>--}}
{{--                                <a class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight" href="documentation.html" @focus="open = true" @focusout="open = false">Documentation</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight" href="support.html" @focus="open = true" @focusout="open = false">Support center</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="font-medium text-sm text-gray-600 hover:text-gray-900 flex py-2 px-5 leading-tight" href="404.html" @focus="open = true" @focusout="open = false">404</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>

                <!-- Desktop sign in links -->
                <ul class="flex grow justify-end flex-wrap items-center">

                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-sm text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3">
                                    Uitloggen
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li>
                            <a class="font-medium text-gray-600 hover:text-gray-900 px-5 py-3 flex items-center transition duration-150 ease-in-out" href="{{ route('login') }}">Log in</a>
                        </li>
                        <li>
                            <a class="btn-sm text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3" href="{{ route('register') }}">
                                <span>Registreer</span>
                                <svg class="w-3 h-3 fill-current text-gray-400 shrink-0 ml-2 -mr-1" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill-rule="nonzero" />
                                </svg>
                            </a>
                        </li>
                    @endguest
                </ul>

            </nav>

            <!-- Mobile menu -->
            <div class="flex md:hidden" x-data="{ expanded: false }">

                <!-- Hamburger button -->
                <button
                    class="hamburger"
                    :class="{ 'active': expanded }"
                    @click.stop="expanded = !expanded"
                    aria-controls="mobile-nav"
                    :aria-expanded="expanded"
                >
                    <span class="sr-only">Menu</span>
                    <svg class="w-6 h-6 fill-current text-gray-900" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect y="4" width="24" height="2" />
                        <rect y="11" width="24" height="2" />
                        <rect y="18" width="24" height="2" />
                    </svg>
                </button>

                <!-- Mobile navigation -->
                <nav
                    id="mobile-nav"
                    class="absolute top-full h-screen pb-16 z-20 left-0 w-full overflow-scroll bg-white"
                    @click.outside="expanded = false"
                    @keydown.escape.window="expanded = false"
                    x-show="expanded"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                >
                    <ul class="px-5 py-2">
                        <li>
                            <a class="flex text-gray-600 hover:text-gray-900 py-2" href="{{route('home')}}">Home</a>
                        </li>
                        <li>
                            <a class="flex text-gray-600 hover:text-gray-900 py-2" href="{{ route('practice-exam.create') }}">Start test</a>
                        </li>

                        @auth
                            <li>
                                <a class="text-gray-600 hover:text-gray-900 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('dashboard.show') }}">Dashboard</a>
                            </li>
                            <li>
                                <a class="text-gray-600 hover:text-gray-900 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('wrong-questions.show') }}">Meest gemaakte fouten</a>
                            </li>
                        @endauth

                        <li>
                            <a class="text-gray-600 hover:text-gray-900 py-2 flex items-center transition duration-150 ease-in-out" href="{{ route('qr.show') }}">QR</a>
                        </li>
{{--                        <li>--}}
{{--                            <a class="flex text-gray-600 hover:text-gray-900 py-2" href="tutorials.html">Tutorials</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a class="flex text-gray-600 hover:text-gray-900 py-2" href="blog.html">Blog</a>--}}
{{--                        </li>--}}
{{--                        <li class="py-2 my-2 border-t border-b border-gray-200">--}}
{{--                            <span class="flex text-gray-600 hover:text-gray-900 py-2">Resources</span>--}}
{{--                            <ul class="pl-4">--}}
{{--                                <li>--}}
{{--                                    <a class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2" href="documentation.html">Documentation</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2" href="support.html">Support center</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="text-sm flex font-medium text-gray-600 hover:text-gray-900 py-2" href="404.html">404</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

                        @guest
                        <li>
                            <a class="flex font-medium w-full text-gray-600 hover:text-gray-900 py-2 justify-center" href="{{ route('login') }}">Log in</a>
                        </li>
                        <li>
                            <a class="btn-sm text-gray-200 bg-gray-900 hover:bg-gray-800 w-full my-2" href="{{ route('register') }}">
                                <span>Registreer</span>
                                <svg class="w-3 h-3 fill-current text-gray-400 shrink-0 ml-2 -mr-1" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill="#999" fill-rule="nonzero" />
                                </svg>
                            </a>
                        </li>
                        @endguest

                        @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn-sm text-gray-200 bg-gray-900 my-10 hover:bg-gray-800">
                                        Uitloggen
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>

            </div>

        </div>
    </div>
</header>
