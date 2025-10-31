@extends('layouts.app')

@section('title', 'Contact Page')

@php
    $inputClass = '
        border-0 border-b border-[#C6C6C6]
        bg-white w-full h-[33.52px]
        focus:border-[#009a66] focus:ring-0 focus:outline-none
        rounded-none transition-colors duration-200 text-[18px]
    ';
@endphp

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')

    <section class="bg-white flex flex-col items-center justify-center overflow-hidden p-5">
        <div
            class="w-full max-w-[1358px] flex flex-col justify-center items-center text-center 
                   animate-fade-in-up space-y-3">

            <p class="home-hero-title text-[15px] md:text-[25px] 
                      opacity-0 animate-fade-in delay-200">
                Welcome to Golf 4 Community
            </p>

            <p
                class="home-hero-bold-text text-[30px] md:text-[60px] font-bold 
                      opacity-0 animate-fade-in delay-400 leading-tight">
                CONTACT US
            </p>
        </div>

        <div class="w-full max-w-[600px] flex flex-col justify-center px-3 md:px-[30px] lg:px-[60px] mt-10 mb-10">

            {{-- Flash messages --}}
            @includeWhen(session('success') || session('error'), 'alerts.alert')

            <form method="POST" action="{{ route('contact.submit') }}" class="w-full">
                @csrf

                {{-- First & Last Name --}}
                <div class="flex flex-col gap-8 mb-8">
                    <div class="flex flex-col w-full">
                        <label class="auth-label">First Name <span class="label-span">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="{{ $inputClass }}"
                            required>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="auth-label">Last Name <span class="label-span">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="{{ $inputClass }}"
                            required>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="auth-label">Email Address <span class="label-span">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="{{ $inputClass }}"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="auth-label">Phone Number <span class="label-span">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="{{ $inputClass }}"
                            required>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="auth-label">Subject <span class="label-span">*</span></label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="{{ $inputClass }}"
                            required>
                        @error('subject')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="auth-label">Message <span class="label-span">*</span></label>
                        <textarea name="message" class="{{ $inputClass }}" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <button type="submit"
                    class="auth-btn cursor-pointer w-full h-[57px] rounded-[10px] flex items-center justify-center bg-[#003C05] text-white transition">
                    Submit
                </button>

            </form>
        </div>
    </section>
@endsection
