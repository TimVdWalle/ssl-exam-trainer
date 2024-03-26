<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="grow">
        <section class="bg-gradient-to-b from-gray-100 to-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                    <!-- Page header -->
                    <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">
                        <h1 class="h1 mb-4">Paswoord vergeten? Geen probleem</h1>
                        <p class="text-xl text-gray-600">
                            We sturen je een link om je wachtwoord te resetten, waarmee je een nieuwe kunt kiezen.
                        </p>
                    </div>

                    <!-- Form -->
                    <div class="max-w-sm mx-auto">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="flex flex-wrap -mx-3 mb-4">
                                <div class="w-full px-3">
                                    <label class="block text-gray-800 text-sm font-medium mb-1" for="email">E-mail <span class="text-red-600">*</span></label>
                                    <input id="email" type="email" name="email" class="form-input w-full text-gray-800" placeholder="E-mail invullen" required />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <x-auth-session-status class="mb-4" :status="session('status')" />


                            <div class="flex flex-wrap -mx-3 mt-6">
                                <div class="w-full px-3">
                                    <button class="btn text-white bg-blue-600 hover:bg-blue-700 w-full">Verstuur reset link</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>


</x-app-layout>
