@extends('layouts.index')
<div class="body ">
<x-guest-layout class="body"  >
    <x-jet-authentication-card>
        <x-slot name="logo">


            <img  style="margin-right: auto;margin-left: auto" class='circle-img 'src="data:image/png;base64,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" class="img-fluid" alt="Responsive image">
              <p style="margin-right: auto;margin-left: auto;" class="my-text-styling">Task it,task management made easy!</p>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class=""  )>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"  style="font-size: 20PX; " class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="font-size: 20PX;"class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-inline" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <footer>
        <p>Copyright ⓒ </p>
    </footer>
</x-guest-layout>
</div>
