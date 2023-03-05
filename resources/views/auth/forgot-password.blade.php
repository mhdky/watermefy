<x-guest-layout>
    {{-- title --}}
    <x-slot name="title">Watermefy - Admin Forgot Password</x-slot>

    <!-- Session Status -->
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="bg-slate-200 w-80 h-10 mt-1 py-1 px-2 block border border-slate-300 rounded-md focus:outline-none focus:ring-0 focus:border-slate-300" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
            </div>
            
        <x-auth-session-status class="mb-2 mt-1 text-sm" :status="session('status')" />
        
        <div class="flex items-center justify-start mt-2">
            <x-primary-button>
                {{ __('Kirim') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
