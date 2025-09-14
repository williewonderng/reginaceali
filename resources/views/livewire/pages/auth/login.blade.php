<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="max-w-md mx-auto bg-white/90 rounded-2xl shadow-2xl p-8 mt-8 animate-fade-in-up">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6 text-center">Sign In</h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-2">
            <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-emerald-300 text-emerald-600 focus:ring-emerald-400" name="remember">
            <label for="remember" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-3">
            @if (Route::has('password.request'))
                <a class="text-sm text-emerald-700 hover:underline" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg font-bold shadow hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 transition w-full sm:w-auto mt-2 sm:mt-0 transform-gpu hover:scale-105 active:scale-95 duration-200">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
