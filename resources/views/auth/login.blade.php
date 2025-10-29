@extends('layouts.app')
@section('title', 'Membership Form')

@php
    $inputClass = '
        border-0 border-b border-[#C6C6C6]
        bg-white w-full h-[33.52px]
        focus:border-[#009a66] focus:ring-0 focus:outline-none
        rounded-none transition-colors duration-200 text-[18px]
    ';
@endphp

@section('content')
    <section class="w-full bg-white min-h-screen flex items-center justify-center">
        <div class="p-3 flex flex-col md:flex-row w-full items-center justify-center relative">
            {{-- Left Image --}}
            <div class="hidden md:block w-full h-full min-h-[95dvh] bg-cover bg-center bg-no-repeat rounded-[20px]"
                style="background-image: url('{{ asset('images/login-bg.svg') }}');">
            </div>



            {{-- Right Form --}}
            <div class="w-full max-w-[589px] flex flex-col justify-center px-3 md:px-[30px] lg:px-[60px]">
                {{-- Logo --}}
                <div class="flex items-center w-full justify-center mb-8">
                    <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo.svg') }}" alt="Logo"
                            class="w-60"></a>
                </div>

                {{-- Flash messages --}}
                @includeWhen(session('success') || session('error'), 'alerts.alert')


                <p class="auth-subtitle">LOGIN</p>
                <h2 class="auth-title pb-8">START YOUR ROUND!</h2>

                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    {{-- First & Last Name --}}
                    <div class="flex flex-col gap-8 mb-8">
                        <div class="flex flex-col w-full">
                            <label class="auth-label">Email Address <span class="label-span">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="{{ $inputClass }}"
                                required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative flex flex-col w-full">
                            <label class="auth-label">Password <span class="label-span">*</span></label>
                            <input type="password" id="password" name="password" class="{{ $inputClass }} pr-10"
                                required>
                            <button id="togglePassword" type="button">
                                <i id="password-icon"
                                    class="fa-solid fa-eye absolute right-2 top-[30px] text-gray-500 cursor-pointer"></i></button>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex justify-between">
                        <div class="flex gap-2 mb-6 items-center">
                            <input id="remember" type="checkbox" name="remember"
                                class="accent-[#003c05] border-gray-300 focus:ring-[#003c05] rounded-full w-5 h-5" required>
                            <label for="remember" class="auth-question">
                                Stay Signed In
                            </label>
                        </div>

                        <div class="">
                            <a href="{{ route('password.request') }}" class="auth-question flex item-center gap-2"><img
                                    src="{{ asset('images/lock.svg') }}" alt="">Forgot Your Password?</a>
                        </div>
                    </div>

                    <button type="submit"
                        class="auth-btn cursor-pointer w-full h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                        LOGIN
                    </button>

                    <p class="auth-or text-center py-3">or</p>

                    <div class="flex items-center gap-3 justify-center">
                        <a href="{{ route('social.redirect', 'facebook') }}"
                            class="flex items-center justify-center w-[70.75px] h-[57px] rounded-[10px] bg-[#133c89] text-white">
                            <i class="fa-brands fa-facebook-f" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('social.redirect', 'google') }}"
                            class="flex items-center justify-center w-[70.75px] h-[57px] rounded-[10px] bg-[#c22e1b] text-white">
                            <i class="fa-brands fa-google" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('social.redirect', 'twitter') }}"
                            class="flex items-center justify-center w-[70.75px] h-[57px] rounded-[10px] bg-black text-white">
                            <i class="fa-brands fa-x-twitter" class="w-5 h-5"></i>
                        </a>
                    </div>

                    <div class="text-center mt-6">
                        <p class="auth-question">
                            Don’t have an account
                            <a href="{{ route('register') }}" class="text-[#009a66] hover:underline font-medium">
                                signup
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
