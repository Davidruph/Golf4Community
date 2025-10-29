@extends('layouts.app')

@section('title', 'Home Page')

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <section class="bg-white flex items-center justify-center overflow-hidden p-5">
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
                Step Into the Heart of
                <br class="hidden lg:flex" /> the Game
            </p>

            <div class="-mt-5 md:-mt-10 lg:-mt-25 opacity-0 animate-fade-in-up delay-600 w-full flex justify-center">
                <img src="{{ asset('images/hero.svg') }}" alt="Golf Hero" class="animate-float w-full" />
            </div>
        </div>
    </section>
@endsection
