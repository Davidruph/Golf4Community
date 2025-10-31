@extends('layouts.app')
@section('title', 'Events')

@section('content')
    <section class="bg-white py-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#009a66]">Events ({{ ucfirst($flag) }})</h2>

                <div class="flex space-x-2">
                    <a href="{{ route('events.index', ['flag' => 'upcoming']) }}"
                        class="px-4 py-2 bg-[#009a66] text-white rounded-md">Upcoming</a>
                    <a href="{{ route('events.index', ['flag' => 'today']) }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">Today</a>
                    <a href="{{ route('events.index', ['flag' => 'thisweek']) }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">This Week</a>
                    <a href="{{ route('events.index', ['flag' => 'thismonth']) }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">This Month</a>
                </div>
            </div>

            @if ($events->count())
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($events as $event)
                        <div class="border rounded-xl shadow-md overflow-hidden bg-white">
                            <img src="{{ asset($event->file ? 'uploads/' . $event->file : 'uploads/no_image.jpg') }}"
                                alt="{{ $event->eventtitle }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ ucfirst($event->eventtitle) }}</h3>
                                <p class="text-gray-600 text-sm mt-1">{{ ucfirst($event->category_type) }}</p>
                                <p class="text-gray-700 mt-2">{{ Str::limit(strip_tags($event->short_description), 80) }}
                                </p>

                                <div class="mt-3 text-sm text-gray-500">
                                    <p><i class="fa fa-map-marker mr-1 text-[#009a66]"></i>
                                        {{ $event->address ?? 'Not updated' }},
                                        {{ $event->city_name }},
                                        {{ $event->state_name }},
                                        {{ $event->country_name }}
                                    </p>
                                    <p><i class="fa fa-clock-o mr-1 text-[#009a66]"></i> {{ $event->start_date }}</p>
                                </div>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('events.show', $event->id) }}"
                                        class="text-[#009a66] font-semibold hover:underline">Details →</a>
                                    <span class="text-xs bg-[#eb9532] text-white px-3 py-1 rounded-full">
                                        {{ number_format($event->distance, 1) }} mi
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $events->links() }}
                </div>
            @else
                <p class="text-center text-gray-500 mt-10">No events found for this filter.</p>
            @endif
        </div>
    </section>
@endsection
