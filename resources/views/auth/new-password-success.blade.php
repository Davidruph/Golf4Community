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

                <div class="flex flex-col justify-center w-full items-center gap-5">
                    <img src="{{ asset('images/tick.svg') }}" class="w-20 h-20" alt="">

                    <p class="password-success-title">Password Reset Successful!</p>
                    <p class="password-success-msg">You’re all set. Your password has been updated successfully.
                    </p>

                    <a href="{{ route('login') }}"
                        class="auth-btn cursor-pointer w-full h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                        Back to Login
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
