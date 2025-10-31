@extends('layouts.app')

@section('title', $partner->first_name . ' ' . $partner->last_name)

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <section class="font-[Inter] bg-gray-50 min-h-screen py-10">
        <div class="container mx-auto px-4 max-w-5xl">
            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('partners.index') }}"
                    class="inline-flex items-center text-[#009a66] hover:text-[#007a52] font-semibold transition">
                    <i class="fa fa-arrow-left mr-2"></i> Back to Partners
                </a>
            </div>

            {{-- Partner Header --}}
            <div class="bg-white shadow-md rounded-2xl overflow-hidden animate-fade-in">
                <img src="{{ $partner->file ? 'https://golf4community.com/uploads/' . $partner->file : 'https://golf4community.com/uploads/no_image.jpg' }}"
                    alt="{{ $partner->first_name }}" class="w-full h-[350px] object-cover rounded-t-2xl">

                <div class="p-6">
                    <h1 class="text-3xl md:text-4xl font-bold text-[#009a66]">
                        {{ ucfirst($partner->first_name) }} {{ ucfirst($partner->last_name) }}
                    </h1>

                    {{-- Website --}}
                    @if (!empty($partner->website_name))
                        <p class="mt-2 text-gray-700">
                            @if (!empty($partner->website_url))
                                <a href="{{ $partner->website_url }}" target="_blank"
                                    class="text-[#009a66] hover:underline">
                                    {{ $partner->website_name }}
                                </a>
                            @else
                                {{ $partner->website_name }}
                            @endif
                        </p>
                    @endif

                    {{-- Address --}}
                    @php
                        $address = trim(
                            "{$partner->address}, {$partner->city_name}, {$partner->state_name}, {$partner->country_name}, {$partner->zip_code}",
                            ', ',
                        );
                    @endphp
                    <p class="mt-2 text-gray-600 flex items-center">
                        <i class="fa fa-map-marker text-[#eb9532] mr-2"></i>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($address) }}" target="_blank"
                            class="hover:underline hover:text-[#009a66]">
                            {{ ucwords($address) }}
                        </a>
                    </p>

                    {{-- Description --}}
                    <div class="mt-6 text-gray-700 leading-relaxed">
                        {!! nl2br(e($partner->description ?? 'No description available.')) !!}
                    </div>

                    {{-- Contact Section --}}
                    <div class="mt-8 border-t pt-6">
                        <h2 class="text-2xl font-semibold text-[#009a66] mb-3">Contact Partner</h2>

                        <div class="flex flex-wrap gap-4 text-gray-700">
                            @if ($partner->user_email)
                                <a href="mailto:{{ $partner->user_email }}"
                                    class="flex items-center hover:text-[#009a66] transition">
                                    <i class="fa fa-envelope text-[#eb9532] mr-2"></i> {{ $partner->user_email }}
                                </a>
                            @endif

                            @if ($partner->phone_no)
                                <a href="tel:{{ $partner->phone_no }}"
                                    class="flex items-center hover:text-[#009a66] transition">
                                    <i class="fa fa-phone text-[#eb9532] mr-2"></i> {{ $partner->phone_no }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
