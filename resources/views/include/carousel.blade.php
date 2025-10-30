<section class="bg-white py-10 md:py-20 px-4 flex items-center justify-center overflow-hidden">
    <div class="w-full max-w-[1358px] relative rounded-2xl shadow-lg overflow-hidden">
        <div id="modern-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[60vh] md:h-[80vh] overflow-hidden rounded-2xl">

                <!-- Slide 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('carousel/img4.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                        alt="Special Needs Golf Tournament">
                    <div
                        class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
                        <h2 class="text-2xl md:text-5xl font-bold mb-3 animate-fade-in-up">Golf Tournament
                        </h2>
                        <p class="text-lg md:text-xl max-w-2xl animate-fade-in delay-200">
                            Fundraising for non-profits for supporting individuals.
                        </p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('carousel/img3.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                        alt="Support Veterans">
                    <div
                        class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
                        <h2 class="text-2xl md:text-5xl font-bold mb-3 animate-fade-in-up">Special Needs
                        </h2>
                        <p class="text-lg md:text-xl max-w-2xl animate-fade-in delay-200">
                            Fundraising for non-profits supporting individuals with special needs.
                        </p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('carousel/img2.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                        alt="Community Impact">


                    <div
                        class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
                        <h2 class="text-2xl md:text-5xl font-bold mb-3 animate-fade-in-up">Support Our Veterans</h2>
                        <p class="text-lg md:text-xl max-w-2xl animate-fade-in delay-200">
                            Honoring heroes through community-driven golf fundraising.
                        </p>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('carousel/img1.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                        alt="Golf for Change">
                    <div
                        class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-6">
                        <h2 class="text-2xl md:text-5xl font-bold mb-3 animate-fade-in-up">Driving Community Impact</h2>
                        <p class="text-lg md:text-xl max-w-2xl animate-fade-in delay-200">
                            Bringing people together to make a lasting difference.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-6 left-1/2 space-x-3">
                <button type="button" class="w-3 h-3 rounded-full bg-white/70" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/70" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/70" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/70" data-carousel-slide-to="3"></button>
            </div>

            <!-- Controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 group-hover:bg-black/50">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </button>
        </div>
    </div>

    {{-- Animations --}}
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease forwards;
        }

        .animate-fade-in {
            animation: fade-in 1.2s ease forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>
</section>
