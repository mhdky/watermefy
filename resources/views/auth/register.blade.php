<x-guest-layout>
    {{-- title --}}
    <x-slot name="title">Watermefy - Add an Admin</x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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

        <div class="flex items-center justify-between mt-2">
            <x-primary-button class="">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
