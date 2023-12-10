<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex bg-white w-full h-full">
        <div class="flex-1 flex justify-center items-center">
            <form method="POST" action="{{ route('login') }}" class=" w-3/4">
                @csrf
                <div class="flex flex-col justify-start items-start gap-3 mb-8">
                    <h2 class="text-5xl font-bold text-gray-950">Login</h2>
                    <p class="text-2xl font-bold text-gray-500">Silahkan masuk ke akun Anda.</p>
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="example@gmail.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" 
                                    placeholder="Masukkan password Anda"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember email') }}</span>
                    </label>
                </div>

                <div class="flex flex-col">
                    <a class="underline text-sm text-right text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-2" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                    </a>
                    <x-primary-button class="flex justify-center items-center bg-green-700 hover:bg-green-800">
                        {{ __('Masuk') }}
                    </x-primary-button>
                    
                    @if (Route::has('password.request'))
                        <p class="text-gray-600 mt-4 text-center">Tidak punya akun? 
                            <a class="underline text-sm text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                            {{ __('Daftar sekarang') }}
                            </a>
                        </p>
                    @endif
                </div>
            </form>
        </div>

        <div class="right-auth flex-1 hidden sm:flex">
        </div>
    </div>

</x-guest-layout>
