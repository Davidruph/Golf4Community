@extends('layouts.app')
@section('title', 'Login Form')

@php
    $inputClass =
        'bg-gray-50 text-gray-900 text-sm focus:ring-[#009a66] focus:border-[#009a66] block w-full p-2.5 rounded-[4px] border border-[#ccc] text-[14px]';
@endphp

@section('content')
    <div class="w-full max-w-4xl mx-auto mt-10 p-8 bg-white border border-gray-200 rounded-lg shadow-md">
        <div class="flex items-center justify-center mb-3">
            <a href="/">
                <img src="/logo.png" class="h-20 w-auto" alt="Logo">
            </a>
        </div>

        <h1 class="text-[27px] text-center mb-10 text-[#eb9532] font-semibold">SIGN IN</h1>

        {{-- ✅ Flash messages --}}
        @includeWhen(session('success') || session('error'), 'alerts.alert')

        {{-- ✅ Login Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="{{ $inputClass }}">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="{{ $inputClass }}">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ✅ Forgot Password --}}
            <div class="text-right mb-6">
                <a href="{{ route('password.request') }}" class="text-sm text-[#009a66] hover:underline font-medium">
                    Forgot Password?
                </a>
            </div>

            <button type="submit"
                class="w-full text-white bg-[#009a66] hover:bg-[#00855a] focus:ring-4 focus:outline-none focus:ring-[#00b37d] font-medium rounded-lg text-sm px-5 py-2.5 transition">
                Sign In
            </button>
        </form>

        {{-- ✅ OR divider --}}
        <div class="flex items-center justify-center my-6">
            <div class="border-t border-gray-300 flex-grow"></div>
            <span class="px-3 text-sm text-gray-500">OR</span>
            <div class="border-t border-gray-300 flex-grow"></div>
        </div>

        {{-- ✅ Social Logins --}}
        <div class="space-y-3">
            <a href="{{ route('social.redirect', 'google') }}"
                class="flex items-center bg-[#c22e1b] justify-center gap-2 w-full border border-gray-300 rounded-lg py-2.5 text-white hover:bg-[#862519] transition">
                <i class="fa-brands fa-google" class="w-5 h-5"></i>
                Continue with Google
            </a>

            <a href="{{ route('social.redirect', 'facebook') }}"
                class="flex items-center bg-[#133c89] justify-center gap-2 w-full border border-gray-300 rounded-lg py-2.5 text-white hover:bg-[#0d2d69] transition">
                <i class="fa-brands fa-facebook-f" class="w-5 h-5"></i>
                Continue with Facebook
            </a>

            <a href="{{ route('social.redirect', 'twitter') }}"
                class="flex items-center bg-black justify-center gap-2 w-full border border-gray-300 rounded-lg py-2.5 text-white hover:bg-gray-800 transition">
                <i class="fa-brands fa-x-twitter" class="w-5 h-5"></i>
                Continue with Twitter
            </a>
        </div>

        {{-- ✅ Register Redirect --}}
        <div class="text-center mt-8">
            <p class="text-sm text-gray-700">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-[#eb9532] hover:underline font-medium">
                    Register
                </a>
            </p>
        </div>
    </div>
@endsection
