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

    <section class="bg-white py-20 px-6 flex items-center justify-center overflow-hidden">
        <div class="w-full max-w-[1358px] grid md:grid-cols-2 gap-10 items-center">
            <!-- Left: Heading -->
            <div class="space-y-4 text-center md:text-left opacity-0 animate-fade-in delay-200">
                <h2 class="text-[#042E00] text-3xl md:text-5xl font-bold leading-tight">
                    Our Goal
                </h2>
                <div class="h-1 w-20 bg-[#094d02] mx-auto md:mx-0 rounded-full"></div>
            </div>

            <!-- Right: Description -->
            <div class="opacity-0 animate-fade-in-up delay-400">
                <p class="text-gray-700 text-base md:text-lg leading-relaxed font-[Inter]">
                    To bring communities and people from every walk of life together and leverage
                    golf as a vehicle to raise funds to improve the state of the society.
                    <br><br>
                    Our mission is to build a close-knit network of corporate leaders, non-profits,
                    and golf professionals who not only share a passion for the game but also want to
                    give back — for the good of the game and the community.
                    <br><br>
                    <span class="font-semibold text-[#042E00]">We are a 501(c)3 organization.</span>
                </p>
            </div>
        </div>
    </section>

    @include('include.carousel')
    @include('include.founder')

    <section class="bg-[#F8F8F8] py-20 px-6 font-[Inter] overflow-hidden">
        <div class="max-w-[1250px] mx-auto text-center space-y-12">
            <!-- Section Title -->
            <div class="opacity-0 animate-fade-in-up delay-200">
                <h2 class="text-3xl md:text-5xl font-bold text-[#042E00]">Get Involved</h2>
                <p class="text-gray-600 text-base md:text-lg mt-3 max-w-[750px] mx-auto">
                    We understand the challenges of our current economy and have made it our mission
                    to help corporate and non-profit partners serve underprivileged communities.
                </p>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mt-12">

                <!-- Get Involved Card -->
                <div
                    class="bg-white rounded-3xl shadow-md p-8 text-left hover:shadow-xl hover:-translate-y-2 
                       transition-all duration-500 ease-in-out opacity-0 animate-fade-in-up delay-400 group">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <h3
                                class="text-2xl font-semibold text-[#042E00] mb-4 group-hover:text-[#009a66] transition-colors">
                                Get Involved
                            </h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                We understand the challenges of our current economy and have made it our mission
                                to help our corporate and non-profit partners serve the underprivileged people
                                in these challenging times.
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="inline-flex items-center text-[#009a66] font-semibold hover:text-[#eb9532] 
                                   transition-all duration-300">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tournaments & Outings Card -->
                <div
                    class="bg-white rounded-3xl shadow-md p-8 text-left hover:shadow-xl hover:-translate-y-2 
                       transition-all duration-500 ease-in-out opacity-0 animate-fade-in-up delay-600 group">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <h3
                                class="text-2xl font-semibold text-[#042E00] mb-4 group-hover:text-[#009a66] transition-colors">
                                Tournaments & Outings
                            </h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Tournament directors and golf fundraisers — we can help your organization
                                establish strategic and synergistic relationships with corporate sponsors
                                who will champion your mission and objectives.
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="inline-flex items-center text-[#009a66] font-semibold hover:text-[#eb9532] 
                                   transition-all duration-300">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Our Clients & Partners Card -->
                <div
                    class="bg-white rounded-3xl shadow-md p-8 text-left hover:shadow-xl hover:-translate-y-2 
                       transition-all duration-500 ease-in-out opacity-0 animate-fade-in-up delay-800 group">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <h3
                                class="text-2xl font-semibold text-[#042E00] mb-4 group-hover:text-[#009a66] transition-colors">
                                Our Clients & Partners
                            </h3>
                            <p class="text-gray-700 text-base leading-relaxed">
                                Partnering with Golf 4 Community strengthens your brand awareness and equity
                                by showcasing your business as a supporter of programs that empower youth
                                and underserved communities.
                            </p>
                        </div>
                        <div class="mt-6">
                            <a href="#"
                                class="inline-flex items-center text-[#009a66] font-semibold hover:text-[#eb9532] 
                                   transition-all duration-300">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Animations --}}
        <style>
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

            .animate-fade-in-up {
                animation: fade-in-up 1s ease forwards;
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

            .delay-800 {
                animation-delay: 0.8s;
            }
        </style>
    </section>

    <section class="bg-white py-16 font-[Inter]">
        <div class="max-w-6xl mx-auto px-5 md:px-10 space-y-16">
            <!-- Title -->
            <div class="text-center opacity-0 animate-fade-up delay-200">
                <h2 class="text-3xl md:text-5xl font-bold text-[#009a66] mb-4">Our Services</h2>
                <p class="text-gray-700 text-lg md:text-xl leading-relaxed">
                    As a result of budget cuts, it's becoming increasingly hard for local companies and non-profits to
                    create a better world through charity golf tournaments. At Golf4Community, we understand the challenges
                    of our current economy and have made it our mission to help our corporate and non-profit partners serve
                    the underprivileged people in these challenging times.
                    <br><br>
                    <a href="#" class="text-[#eb9532] font-semibold hover:underline">To learn more Click here.</a>
                </p>
            </div>

            <!-- Non-Profit Section -->
            <div class="md:grid md:grid-cols-2 gap-10 items-start opacity-0 animate-fade-up delay-400">
                <div>
                    <h3 class="text-2xl font-bold text-[#009a66] mb-4">For Non-profit clients</h3>
                    <p class="text-gray-700 leading-relaxed">
                        In today's challenging economic times, non-profit leaders recognize the need for multiple funding
                        sources and developing business relationships that enable them to accomplish their missions.
                        Golf4Community will provide strategic input into planning, implementation and management of charity
                        programs that leverage the game of golf:
                    </p>
                </div>
                <ul class="list-decimal pl-6 text-gray-700 leading-relaxed space-y-3">
                    <li><b>Sponsor prospecting</b> - Golf4Community will help your organization establish strategic and
                        synergistic relationships with corporate organizations that will serve as key sponsors of your
                        mission and objectives.</li>
                    <li><b>Recruitment</b> - Recruiting golfers who are not only passionate about golf but also want to make
                        charitable contributions is key to the success of any charity based tournament. Golf4Community will
                        help you recruit golfers by tapping into its growing database of local golfers that includes
                        business professionals, medical doctors, tournament directors, amateur and golf pros.</li>
                    <li><b>Cost control</b> - Golf4Community staff brings years of experience and long established
                        relationships with local golf courses to the table. We will help you minimize your costs and meet
                        your financial goals by reaching out to potential business sponsors and golfers. In addition, our
                        experienced staff will negotiate on your behalf to get best prices for golf courses.</li>
                </ul>
            </div>

            <!-- Corporate Section -->
            <div class="md:grid md:grid-cols-2 gap-10 items-start opacity-0 animate-fade-up delay-600">
                <div>
                    <h3 class="text-2xl font-bold text-[#009a66] mb-4">For Corporate clients</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Based near Atlanta, Georgia, Golf4Community leverages golf to help clients establish customer
                        relationships, business development opportunities and achieve strategic marketing objectives.
                    </p>
                </div>
                <ul class="list-decimal pl-6 text-gray-700 leading-relaxed space-y-3">
                    <li><b>Speaking engagements</b> - Create awareness about your business and promote your business in the
                        local communities through business presentations and seminars during golf tournaments and clinics.
                    </li>
                    <li><b>Sponsor recognition</b> - Being a partner with Golf4Community, create a stronger brand awareness
                        and equity by showcasing your business as a sponsor for programs that help youth and underserved
                        members of the society.</li>
                    <li><b>Corporate Social Responsibility</b> - Creating or sponsoring charity events is a great way to
                        differentiate your company from your competitors while doing something good in the process.
                        Corporate sponsorships help companies bolster their reputation and attract new customers.
                        Golf4Community golf strategies, programs and events can help your organization meet its corporate
                        social responsibility goals.</li>
                </ul>
            </div>

            <!-- Individual Golfers -->
            <div class="md:grid md:grid-cols-2 gap-10 items-start opacity-0 animate-fade-up delay-800">
                <div>
                    <h3 class="text-2xl font-bold text-[#009a66] mb-4">For Individual Golf enthusiasts</h3>
                    <p class="text-gray-700 leading-relaxed">
                        If you are a pro golfer or an amateur or someone who's looking to get into the world of golf, we not
                        only offer golf lessons but also a way to connect with other individuals from your area, community,
                        church, profession etc.
                    </p>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Golf4Community is building a comprehensive database of golfers that are not only interested in
                    supporting our mission through golf but also would like to network with like-minded individuals. Our
                    database will offer a wide array of features and opportunities to search for and connect with local
                    golfers in your area.
                </p>
            </div>
        </div>

        <style>
            @keyframes fade-up {
                0% {
                    opacity: 0;
                    transform: translateY(40px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-up {
                animation: fade-up 1s ease forwards;
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

            .delay-800 {
                animation-delay: 0.8s;
            }
        </style>

    </section>

    @include('include.mission')

@endsection
