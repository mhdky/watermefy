<x-guest-layout>
    {{-- title --}}
    <x-slot name="title">Watermefy - Admin Reset Password</x-slot>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-2">
            <x-primary-button>
                {{ __('Reset') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
