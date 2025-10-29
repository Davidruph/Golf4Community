@extends('layouts.app')

@section('title', 'Home Page')

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <section class="bg-white p-5 overflow-hidden">
        <div
            class="w-full max-w-[1358px] px-3 md:px-[30px] flex flex-col justify-center items-center 
                   animate-fade-in-up space-y-3">

            <p
                class="home-hero-title text-center text-[15px] md:text-[25px] 
                      opacity-0 animate-fade-in delay-200">
                Welcome to Golf 4 Community
            </p>

            <p
                class="home-hero-bold-text text-[30px] md:text-[60px] font-bold text-center
                      opacity-0 animate-fade-in delay-400">
                Step Into the Heart of
                <br class="hidden lg:flex" /> the Game
            </p>

            <div class="-mt-5 lg:-mt-25 md:-mt-10 opacity-0 animate-fade-in-up delay-600">
                <img src="{{ asset('images/hero.svg') }}" alt="Golf Hero"
                    class="animate-float mx-auto w-full max-w-[1358px]" />
            </div>
        </div>
    </section>
@endsection
