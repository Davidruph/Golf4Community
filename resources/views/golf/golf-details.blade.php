@extends('layouts.app')

@section('title', 'Golf Course Details')

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="font-[Inter]">
        <section class="max-w-[1300px] mx-auto px-4 py-12 animate-fade-in-up">

            {{-- Back Button --}}
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-[32px] font-bold text-[#009a66]">Golf Course Details</h1>
                <a href="{{ route('golf.courses') }}"
                    class="bg-[#009a66] text-white px-4 py-2 rounded-lg hover:bg-[#007a52] transition">
                    <i class="fa fa-arrow-left mr-2"></i> Back to Courses
                </a>
            </div>

            {{-- Image Carousel --}}
            <div id="golfCourseCarousel" class="relative w-full rounded-2xl shadow-lg animate-fade-in" data-carousel="slide">
                <div class="relative h-[420px] overflow-hidden rounded-2xl">
                    @php
                        $images = [
                            $course->file,
                            $course->photo1 ?? null,
                            $course->photo2 ?? null,
                            $course->photo3 ?? null,
                        ];
                    @endphp

                    @foreach ($images as $key => $img)
                        @php
                            $imagePath = $img
                                ? 'https://golf4community.com/uploads/' . $img
                                : 'https://golf4community.com/uploads/no_image.jpg';
                        @endphp
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ $imagePath }}" alt="{{ $course->course_name }}"
                                class="absolute block w-full h-[420px] object-cover top-0 left-0">
                        </div>
                    @endforeach
                </div>

                {{-- Carousel Controls --}}
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#009a66]/70 group-hover:bg-[#009a66] focus:ring-4 focus:ring-[#009a66]/30">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </span>
                </button>

                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#009a66]/70 group-hover:bg-[#009a66] focus:ring-4 focus:ring-[#009a66]/30">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </span>
                </button>
            </div>

            {{-- Course Info --}}
            <div class="mt-10 grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-[#009a66]">{{ $course->course_name }}</h2>

                    @if ($course->contact_person)
                        <p class="text-gray-700"><i class="fa fa-user mr-2 text-[#eb9532]"></i>
                            {{ $course->contact_person }}
                        </p>
                    @endif

                    @if ($course->phone && $course->phone !== '0')
                        <p class="text-gray-700"><i class="fa fa-phone mr-2 text-[#eb9532]"></i>{{ $course->phone }}</p>
                    @endif

                    @php
                        $address = trim(
                            "{$course->address}, {$course->city_name}, {$course->state_name}, {$course->country_name}, {$course->zip_code}",
                            ', ',
                        );
                    @endphp
                    <p class="text-gray-700"><i class="fa fa-map-marker mr-2 text-[#eb9532]"></i>{{ ucwords($address) }}</p>

                    <p class="text-gray-700"><i class="fa fa-calendar mr-2 text-[#eb9532]"></i>
                        Added on {{ \Carbon\Carbon::parse($course->doc)->format('M d, Y') }}
                    </p>
                </div>

                @if (!empty($course->google_map_web_link))
                    <div class="mt-8 opacity-0 animate-fade-in-up delay-[400ms]">
                        <h3 class="text-xl font-semibold mb-2 text-[#009a66]">Location Map</h3>

                        <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                            <p class="text-sm text-gray-700 mb-2">
                                📍 {{ $course->address }},
                                {{ $course->city_name }},
                                {{ $course->state_name }},
                                {{ $course->country_name }}
                            </p>

                            <a href="{{ $course->google_map_web_link }}" target="_blank"
                                class="inline-block bg-[#009a66] text-white px-4 py-2 rounded-full hover:bg-[#007a52] transition">
                                View on Google Maps →
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Description --}}
            <div class="mt-10">
                <h3 class="text-xl font-semibold text-[#009a66] mb-3">Description</h3>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $course->general_description ?? 'Sorry, no description available.' }}
                </p>
            </div>

            {{-- Social Share --}}
            <div class="mt-10 flex space-x-6 text-2xl text-[#009a66]">
                <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i
                        class="fab fa-facebook"></i></a>
                <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"><i class="fab fa-pinterest"></i></a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"><i
                        class="fab fa-twitter"></i></a>
            </div>

        </section>
    </div>

@endsection
