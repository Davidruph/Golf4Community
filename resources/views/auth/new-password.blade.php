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
                    <a href="{{ route('homepage') }}"><img src="{{ asset('logo.png') }}" alt="Logo" class="w-25"></a>
                </div>

                {{-- Flash messages --}}
                @includeWhen(session('success') || session('error'), 'alerts.alert')


                <p class="auth-subtitle">Create a New Password</p>
                <h2 class="forgot-title pb-8">Enter a strong password you’ll remember next time.</h2>

                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    <div class="flex flex-col gap-8 mb-8">
                        {{-- Password --}}
                        <div class="relative flex flex-col w-full">
                            <label for="password" class="auth-label">New Password <span class="label-span">*</span></label>
                            <input type="password" id="password" name="password" class="{{ $inputClass }} pr-10"
                                required>
                            <button id="togglePassword" type="button">
                                <i id="password-icon"
                                    class="fa-solid fa-eye absolute right-2 top-[30px] text-gray-500 cursor-pointer"></i></button>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="relative flex flex-col w-full">
                            <label for="confirmPassword" class="auth-label">Confirm New Password <span
                                    class="label-span">*</span></label>
                            <input type="password" id="confirmPassword" name="password_confirmation"
                                class="{{ $inputClass }} pr-10" required>
                            <button type="button" id="toggleConfirmPassword"><i id="confirm-icon"
                                    class="fa-solid fa-eye absolute right-2 top-[30px] text-gray-500 cursor-pointer"></i></button>
                        </div>
                    </div>

                    <button type="submit"
                        class="auth-btn cursor-pointer w-full h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                        SAVE NEW PASSWORD
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
