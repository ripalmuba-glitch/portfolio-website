<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Email" class="text-gray-400 text-sm" />
            <x-text-input id="email"
                          class="block mt-1 w-full bg-[#0a192f] border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 text-gray-200"
                          type="email" name="email" :value="old('email')" required autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-gray-400 text-sm" />
            <x-text-input id="password"
                            class="block mt-1 w-full bg-[#0a192f] border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 text-gray-200"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center mt-6">
            <x-primary-button class="w-full justify-center text-base py-3 bg-indigo-600 hover:bg-indigo-700">
                {{ __('Log In') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md mt-4" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
