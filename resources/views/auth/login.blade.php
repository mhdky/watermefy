<x-guest-layout>
    {{-- title --}}
    <x-slot name="title">Watermefy - Admin Login Page</x-slot>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        <h1 class="mb-5 text-black-primary text-xl font-bold">Admin Login</h1>
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-2">
            <x-primary-button class="">
                {{ __('Log in') }}
            </x-primary-button>
            
            @if (Route::has('password.request'))
                <a class="text-blue-500 text-sm mt-1" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>