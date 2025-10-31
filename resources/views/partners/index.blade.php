@extends('layouts.app')

@section('title', 'Partners')

@section('header')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="font-[Inter] mb-10 mt-5">
        <div class="w-full max-w-[1358px] flex flex-col justify-center items-center text-center space-y-3">
            <p class="home-hero-title text-[15px] md:text-[25px] animate-fade-in delay-200">
                OUR TRUSTED
            </p>

            <p class="home-hero-bold-text text-[30px] md:text-[60px] font-bold animate-fade-in delay-400 leading-tight">
                PARTNERS
            </p>
        </div>

        <section class="py-10">
            <div class="container mx-auto px-4">
                {{-- Search and Toggle --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <form action="{{ route('partners.index') }}" method="GET"
                        class="flex items-center space-x-2 w-full md:w-auto">
                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search partners..."
                            class="border rounded-lg px-4 py-2 w-full md:w-72 focus:ring-2 focus:ring-[#009a66] focus:outline-none">
                        <button type="submit"
                            class="bg-[#009a66] text-white px-4 py-2 rounded-lg hover:bg-[#007a52] transition">
                            Search
                        </button>
                        @if (!empty($search))
                            <a href="{{ route('partners.index') }}"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
                                Clear
                            </a>
                        @endif
                    </form>

                    <div class="flex space-x-2 mt-3 md:mt-0">
                        <a href="{{ route('partners.index', ['view' => 'list', 'search' => $search]) }}"
                            class="px-3 py-2 rounded-lg {{ $viewType === 'list' ? 'bg-[#009a66] text-white' : 'bg-white border' }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ route('partners.index', ['view' => 'grid', 'search' => $search]) }}"
                            class="px-3 py-2 rounded-lg {{ $viewType === 'grid' ? 'bg-[#009a66] text-white' : 'bg-white border' }}">
                            <i class="fa fa-th"></i>
                        </a>
                    </div>
                </div>

                {{-- Partners --}}
                @if ($partners->count() > 0)
                    @if ($viewType === 'grid')
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($partners as $partner)
                                @php
                                    $image = $partner->file
                                        ? 'https://golf4community.com/uploads/' . $partner->file
                                        : 'https://golf4community.com/uploads/no_image.jpg';
                                    $address = trim(
                                        "{$partner->address}, {$partner->city_name}, {$partner->state_name}, {$partner->country_name}, {$partner->zip_code}",
                                        ', ',
                                    );
                                    $website = $partner->website_name
                                        ? ($partner->website_url
                                            ? '<a href="' .
                                                e($partner->website_url) .
                                                '" target="_blank" class="text-[#009a66] hover:underline">' .
                                                e($partner->website_name) .
                                                '</a>'
                                            : e($partner->website_name))
                                        : 'Not Updated';
                                @endphp

                                <div
                                    class="bg-white shadow-md rounded-2xl overflow-hidden animate-fade-in hover:shadow-lg transition">
                                    <img src="{{ $image }}" alt="{{ $partner->first_name }}"
                                        class="w-full h-[200px] object-cover">
                                    <div class="p-4 flex flex-col justify-between h-[180px]">
                                        <div>
                                            <h3 class="text-lg font-semibold text-[#009a66]">
                                                {{ ucfirst($partner->first_name) }} {{ ucfirst($partner->last_name) }}
                                            </h3>
                                            <p class="text-gray-600 text-sm mt-1">{!! $website !!}</p>
                                            <p class="text-gray-600 text-sm mt-1">
                                                <i class="fa fa-map-marker text-[#eb9532] mr-1"></i>
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($address) }}"
                                                    target="_blank" class="hover:underline hover:text-[#009a66]"
                                                    title="Open in Google Maps">
                                                    {{ ucwords($address) }}
                                                </a>
                                            </p>
                                        </div>

                                        <div class="flex justify-end items-center mt-3">
                                            <a href="{{ route('partners.show', $partner->id) }}"
                                                class="text-[#009a66] hover:text-[#007a52] text-sm font-semibold">
                                                Read More <i class="fa fa-long-arrow-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        @foreach ($partners as $partner)
                            @php
                                $image = $partner->file
                                    ? 'https://golf4community.com/uploads/' . $partner->file
                                    : 'https://golf4community.com/uploads/no_image.jpg';
                                $address = trim(
                                    "{$partner->address}, {$partner->city_name}, {$partner->state_name}, {$partner->country_name}, {$partner->zip_code}",
                                    ', ',
                                );
                                $website = $partner->website_name
                                    ? ($partner->website_url
                                        ? '<a href="' .
                                            e($partner->website_url) .
                                            '" target="_blank" class="text-[#009a66] hover:underline">' .
                                            e($partner->website_name) .
                                            '</a>'
                                        : e($partner->website_name))
                                    : 'Not Updated';
                            @endphp

                            <div
                                class="bg-white shadow-md rounded-2xl mb-6 flex flex-col md:flex-row overflow-hidden animate-fade-in">
                                <img src="{{ $image }}" alt="{{ $partner->first_name }}"
                                    class="w-full md:w-[300px] lg:w-[350px] h-[250px] object-cover flex-shrink-0 rounded-l-2xl">

                                <div class="p-6 flex flex-col justify-between w-full">
                                    <div class="space-y-2">
                                        <h3 class="text-2xl font-bold text-[#009a66]">
                                            {{ ucfirst($partner->first_name) }} {{ ucfirst($partner->last_name) }}
                                        </h3>

                                        <p class="text-gray-700">{!! $website !!}</p>

                                        <p class="text-gray-700 flex items-start">
                                            <i class="fa fa-map-marker text-[#eb9532] mr-2 mt-1"></i>
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($address) }}"
                                                target="_blank" class="hover:underline hover:text-[#009a66]"
                                                title="Open in Google Maps">
                                                {{ ucwords($address) }}
                                            </a>
                                        </p>
                                    </div>

                                    <div class="mt-4 flex justify-end">
                                        <a href="{{ route('partners.show', $partner->id) }}"
                                            class="text-white bg-[#009a66] px-4 py-2 rounded-lg hover:bg-[#007a52] transition">
                                            Read More <i class="fa fa-long-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="mt-6">
                        {{ $partners->links() }}
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
