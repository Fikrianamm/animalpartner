<x-guest-layout>
    <div class="flex bg-white w-full h-full">
        <div class="flex-1 flex justify-center items-center">
            <form method="POST" action="{{ route('register') }}" class="w-3/4">
                @csrf

                <div class="flex flex-col justify-start items-start gap-3 mb-8">
                    <h2 class="text-5xl font-bold text-gray-950">Registrasi</h2>
                    <p class="text-2xl font-bold text-gray-500">Bergabunglah dengan Platform Kami!</p>
                </div>
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-4">
                    <x-primary-button class="flex justify-center items-center bg-teal-700 hover:bg-teal-800">
                        {{ __('Register') }}
                    </x-primary-button>
                    
                    <p class="text-gray-600 mt-4 text-center">Sudah memiliki akun? 
                        <a class="underline text-sm text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Masuk di sini') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
        <div class="right-auth flex-1 hidden sm:flex">
        </div>
    </div>
</x-guest-layout>
