<section class="bg-white py-20 px-6 font-[Inter] overflow-hidden">
    <div class="max-w-[1250px] mx-auto space-y-16">
        <!-- Section Title -->
        <div class="text-center opacity-0 animate-fade-in-up delay-200">
            <h2 class="text-3xl md:text-5xl font-bold text-[#042E00]">Meet the Team</h2>
            <p class="text-gray-600 mt-3 text-base md:text-lg">Get to know the visionary behind Golf 4 Community</p>
        </div>

        <!-- Founder Profile -->
        <div
            class="flex flex-col lg:flex-row items-center lg:items-start gap-10 bg-[#F8F8F8] rounded-3xl shadow-md 
                   p-6 md:p-10 lg:p-12 hover:shadow-lg transition-all duration-500 ease-in-out opacity-0 animate-fade-in delay-400">

            <!-- Image -->
            <div class="relative w-full md:w-[500px] lg:w-[380px] flex justify-center shrink-0">
                <div
                    class="relative rounded-2xl overflow-hidden group transition-all duration-500 ease-in-out 
                           hover:scale-[1.03] hover:shadow-xl w-full max-w-[380px]">
                    <img src="{{ asset('carousel/founder.jpg') }}" alt="Bradford Patterson"
                        class="rounded-2xl w-full h-[400px] md:h-[450px] object-cover">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#042E00]/70 via-transparent to-transparent 
                               opacity-0 group-hover:opacity-100 transition-opacity duration-500 ease-in-out">
                    </div>
                </div>
            </div>

            <!-- Text -->
            <div class="flex-1 space-y-6 text-center md:text-left mx-auto lg:mx-0 max-w-[700px]">
                <h3 class="text-2xl md:text-3xl font-bold text-[#042E00]">Bradford Patterson</h3>
                <p class="text-[#eb9532] font-medium text-lg">Founder & CEO</p>

                <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                    <span class="font-semibold text-[#042E00]">Founder and CEO, Bradford Patterson</span> is a seasoned
                    golfer
                    who has been involved in the business of golf for more than <span class="font-semibold">20
                        years.</span>
                    During his golf career, Brad has followed a diverse and accomplished path in various capacities and
                    roles
                    including <span class="font-semibold">amateur golf player</span>,
                    <span class="font-semibold">tournament director</span>, and
                    <span class="font-semibold">golf instructor.</span>
                    Brad is also a <span class="font-semibold text-[#042E00]">member of the United States Golf
                        Association.</span>
                </p>

                <div class="pt-4">
                    <h4 class="text-xl font-semibold text-[#042E00] mb-3">Highlights of His Charity Work:</h4>

                    <ul class="list-disc pl-5 space-y-3 text-gray-700 text-base md:text-lg leading-relaxed text-left">
                        <li class="animate-slide-up delay-600">
                            Has appeared at various events and seminars as a guest speaker, including
                            <span class="font-semibold">three years as a speaker at the Global Humanitarian
                                Summit</span>
                            held at <span class="font-semibold">Emory University in Atlanta, Georgia</span> — where he
                            educated
                            people from diverse backgrounds on how golf can be effectively used as a
                            <span class="font-semibold text-[#eb9532]">fund-raising tool for non-profit
                                organizations.</span>
                        </li>
                        <li class="animate-slide-up delay-700">
                            Recruits golfers for <span class="font-semibold">charity-based tournaments</span> to assist
                            medical doctors and non-profits in raising money for medical missions and camps.
                        </li>
                        <li class="animate-slide-up delay-800">
                            Conducts <span class="font-semibold">free introductory golf lessons</span> at middle schools
                            in Georgia,
                            inspiring young players to take up the game.
                        </li>
                        <li class="animate-slide-up delay-900">
                            Assists the <span class="font-semibold">Disabled Veterans Programs</span> by helping
                            veterans with
                            disabilities “get their game on” through personalized golf lessons.
                        </li>
                        <li class="animate-slide-up delay-1000">
                            Conducts <span class="font-semibold">bi-monthly golf and tennis clinics</span> to provide
                            golf
                            instruction for children and adults who are physically and mentally challenged.
                            For more than <span class="font-semibold">four years</span>, Brad has been dedicated to his
                            mission
                            and has helped several individuals forget about their disabilities through
                            <span class="font-semibold text-[#eb9532]">interactive and fun-filled golf lessons.</span>
                        </li>
                    </ul>
                </div>

                <p class="italic text-[#042E00] font-medium mt-4 text-center md:text-left">
                    “Through golf, we don’t just build better players — we build stronger communities.”
                </p>
            </div>
        </div>

        <!-- Founder Video -->
        <div class="relative flex justify-center items-center opacity-0 animate-fade-in-up delay-800">
            <div
                class="w-full max-w-[900px] rounded-3xl overflow-hidden shadow-xl transition-transform duration-700 ease-in-out hover:scale-[1.02] hover:shadow-2xl">
                <iframe class="w-full aspect-video rounded-3xl" src="https://www.youtube.com/embed/fJqO2IbsJ7Q"
                    title="Founder’s Story - Bradford Patterson" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    {{-- Animations --}}
    <style>
        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-up {
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
            animation: fade-in 1.2s ease forwards;
        }

        .animate-fade-in-up {
            animation: fade-in-up 1.4s ease forwards;
        }

        .animate-slide-up {
            animation: slide-up 1s ease forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        .delay-700 {
            animation-delay: 0.7s;
        }

        .delay-800 {
            animation-delay: 0.8s;
        }

        .delay-900 {
            animation-delay: 0.9s;
        }

        .delay-1000 {
            animation-delay: 1s;
        }
    </style>
</section>
