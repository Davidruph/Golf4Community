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


                <p class="auth-subtitle">FORGOT YOUR PASSWORD?</p>
                <h2 class="forgot-title pb-8">Don’t worry — it happens to the best of us. </h2>

                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf

                    {{-- First & Last Name --}}
                    <div class="flex flex-col gap-8 mb-5">
                        <div class="flex flex-col w-full">
                            <label class="auth-label">Email Address <span class="label-span">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="{{ $inputClass }}"
                                required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full flex justify-end mb-10">
                        <div class="flex w-full gap-2 items-center justify-end">
                            <p class="auth-question flex items-center gap-2"><img src="{{ asset('images/arrow.svg') }}"
                                    alt="">Remembered?, </p>
                            <a href="{{ route('login') }}" class="auth-question underline">Back to Login</a>
                        </div>
                    </div>

                    <button type="submit"
                        class="auth-btn cursor-pointer w-full h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                        SEND RESET LINK
                    </button>

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
