<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="max-w-md mx-auto bg-white/90 rounded-2xl shadow-2xl p-8 mt-8 animate-fade-in-up">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6 text-center">Create Account</h2>
    <form wire:submit="register" class="space-y-6">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full rounded-lg border-emerald-200 focus:ring-emerald-400 focus:border-emerald-400" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-3">
            <a class="text-sm text-emerald-700 hover:underline" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg font-bold shadow hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-400 transition w-full sm:w-auto mt-2 sm:mt-0 transform-gpu hover:scale-105 active:scale-95 duration-200">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
