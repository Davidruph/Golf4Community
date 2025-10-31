@extends('layouts.app')

@section('title', 'Golf Courses')

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="font-[Inter] mb-10">
        <div
            class="w-full max-w-[1358px] flex flex-col justify-center items-center text-center 
                   animate-fade-in-up space-y-3">

            <div class="flex justify-center opacity-0 animate-fade-in-up delay-600 mt-5">
                <img src="{{ asset('images/course.svg') }}" alt="" class="animate-float">
            </div>

            <p class="home-hero-title text-[15px] md:text-[25px] opacity-0 animate-fade-in delay-200">
                OUR TOP RATED
            </p>

            <p
                class="home-hero-bold-text text-[30px] md:text-[60px] font-bold opacity-0 animate-fade-in delay-400 leading-tight">
                GOLF COURSES
            </p>
        </div>

        <section class="min-h-scree py-10">
            <div class="container mx-auto px-4">
                {{-- Header, Search, and Toggle --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">


                    <form action="{{ route('golf.courses') }}" method="GET"
                        class="flex items-center space-x-2 w-full md:w-auto">
                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search courses..."
                            class="border rounded-lg px-4 py-2 w-full md:w-72 focus:ring-2 focus:ring-[#009a66] focus:outline-none">

                        <button type="submit"
                            class="bg-[#009a66] text-white px-4 py-2 rounded-lg hover:bg-[#007a52] transition">
                            Search
                        </button>

                        @if (!empty($search))
                            <a href="{{ route('golf.courses') }}"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                                Clear
                            </a>
                        @endif
                    </form>


                    <div class="flex space-x-2 mt-3 md:mt-0">
                        <a href="{{ route('golf.courses', ['view' => 'list', 'search' => $search]) }}"
                            class="px-3 py-2 rounded-lg {{ $viewType === 'list' ? 'bg-[#009a66] text-white' : 'bg-white border' }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ route('golf.courses', ['view' => 'grid', 'search' => $search]) }}"
                            class="px-3 py-2 rounded-lg {{ $viewType === 'grid' ? 'bg-[#009a66] text-white' : 'bg-white border' }}">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                </div>

                {{-- Results --}}
                @if ($courses->count() > 0)
                    @if ($viewType === 'grid')
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($courses as $course)
                                @php
                                    $image = $course->file
                                        ? 'https://golf4community.com/uploads/' . $course->file
                                        : 'https://golf4community.com/uploads/no_image.jpg';

                                    $address = trim(
                                        "{$course->address}, {$course->city_name}, {$course->state_name}, {$course->country_name}, {$course->zip_code}",
                                        ', ',
                                    );
                                @endphp
                                <div
                                    class="bg-white shadow-md rounded-2xl overflow-hidden animate-fade-in hover:shadow-lg transition">
                                    <img src="{{ $image }}" alt="{{ $course->course_name }}"
                                        class="w-full h-[200px] object-cover">
                                    <div class="p-4 flex flex-col justify-between h-[180px]">
                                        <div>
                                            <h3 class="text-lg font-semibold text-[#009a66]">
                                                {{ $course->course_name ?? 'Not Available' }}</h3>
                                            <p class="text-gray-600 text-sm mt-1">
                                                <i class="fa fa-map-marker text-[#eb9532] mr-1"></i>
                                                {{ ucwords($address) }}
                                            </p>
                                        </div>

                                        <div class="flex justify-between items-center mt-3">
                                            <a href="{{ url('golf-details/' . $course->id) }}"
                                                class="text-[#009a66] hover:text-[#007a52] text-sm font-semibold">
                                                Details >>
                                            </a>
                                            <div class="flex space-x-3 text-[#009a66] text-lg">
                                                <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                                    target="_blank"><i class="fab fa-facebook"></i></a>
                                                <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}"
                                                    target="_blank"><i class="fab fa-linkedin"></i></a>
                                                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}"
                                                    target="_blank"><i class="fab fa-pinterest"></i></a>
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
                                                    target="_blank"><i class="fab fa-twitter"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach ($courses as $course)
                            @php
                                $image = $course->file
                                    ? 'https://golf4community.com/uploads/' . $course->file
                                    : 'https://golf4community.com/uploads/no_image.jpg';

                                $address = trim(
                                    "{$course->address}, {$course->city_name}, {$course->state_name}, {$course->country_name}, {$course->zip_code}",
                                    ', ',
                                );
                            @endphp
                            <div
                                class="bg-white shadow-md rounded-2xl mb-6 flex flex-col md:flex-row overflow-hidden animate-fade-in">
                                <img src="{{ $image }}" alt="{{ $course->course_name }}"
                                    class="w-full md:w-[300px] lg:w-[350px] h-[250px] object-cover flex-shrink-0 rounded-l-2xl">

                                <div class="p-6 flex flex-col justify-between w-full">
                                    <div>
                                        <h3 class="text-2xl font-bold text-[#009a66]">
                                            {{ $course->course_name ?? 'Not Available' }}</h3>
                                        @if ($course->contact_person)
                                            <p class="text-gray-700 mt-2"><i
                                                    class="fa fa-user text-[#eb9532] mr-2"></i>{{ $course->contact_person }}
                                            </p>
                                        @endif
                                        @if ($course->phone && $course->phone !== '0')
                                            <p class="text-gray-700"><i
                                                    class="fa fa-phone text-[#eb9532] mr-2"></i>{{ $course->phone }}</p>
                                        @endif
                                        <p class="text-gray-700"><i
                                                class="fa fa-map-marker text-[#eb9532] mr-2"></i>{{ ucwords($address) }}
                                        </p>
                                    </div>

                                    <div class="mt-4 flex justify-between items-center">
                                        <a href="{{ url('golf-details/' . $course->id) }}"
                                            class="text-white bg-[#009a66] px-4 py-2 rounded-lg hover:bg-[#007a52] transition">
                                            Details <i class="fa fa-long-arrow-right"></i>
                                        </a>

                                        <div class="flex space-x-4 text-[#009a66] text-xl">
                                            <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank"><i class="fab fa-facebook"></i></a>
                                            <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank"><i class="fab fa-pinterest"></i></a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
                                                target="_blank"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="mt-6">
                        {{ $courses->links() }}
                    </div>
                @else
                    <div class="text-center py-10 text-gray-600 text-lg">No results found!</div>
                @endif
            </div>
        </section>
    </div>

    <style>
        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease forwards;
        }
    </style>
@endsection
