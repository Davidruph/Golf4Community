<section class="bg-white p-5">
    <div
        class="border w-full max-w-[1358px] rounded-[20px] py-2.5 px-[30px] border-[#BDBDBD] items-center justify-between mx-auto flex flex-wrap lg:flex-nowrap">

        <!-- Logo + Menu Toggle -->
        <div class="flex items-center justify-between w-full lg:w-auto">
            <a href="{{ route('homepage') }}">
                <img src="{{ asset('images/logo.svg') }}"
                    class="w-[147px] h-[60px] transition-transform duration-500 hover:scale-105" alt="Logo">
            </a>

            <!-- Menu Toggle Button (visible on md and below) -->
            <button id="menu-toggle"
                class="lg:hidden text-[#042E00] focus:outline-none transition-transform duration-300 hover:scale-110">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-8 h-8 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu Items -->
        <div id="menu"
            class="hidden lg:flex flex-col lg:flex-row lg:items-center lg:space-x-8 w-full lg:w-auto mt-4 lg:mt-0 transition-all duration-500 ease-in-out">

            <ul class="flex flex-col lg:flex-row gap-3 lg:gap-6 text-[16px] font-medium text-gray-900 w-full lg:w-auto">
                <li><a href="/"
                        class="menu block py-2 px-3 hover:text-[#042E00] border-b-2 border-transparent hover:border-[#042E00] transition-all duration-300">Home</a>
                </li>
                <li><a href="/about"
                        class="menu block py-2 px-3 hover:text-[#042E00] border-b-2 border-transparent hover:border-[#042E00] transition-all duration-300">About
                        Us</a></li>
                <li><a href="/tournaments"
                        class="menu block py-2 px-3 hover:text-[#042E00] border-b-2 border-transparent hover:border-[#042E00] transition-all duration-300">Tournaments</a>
                </li>
                <li><a href="/golf-courses"
                        class="menu block py-2 px-3 hover:text-[#042E00] border-b-2 border-transparent hover:border-[#042E00] transition-all duration-300">Golf
                        Courses</a></li>
                <li><a href="/contact"
                        class="menu block py-2 px-3 hover:text-[#042E00] border-b-2 border-transparent hover:border-[#042E00] transition-all duration-300">Contact</a>
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="flex flex-col lg:flex-row lg:items-center gap-3 mt-4 lg:mt-0">
                <a href=""
                    class="donate-btn border border-[#BDBDBD] w-full lg:w-[100px] h-10 rounded-[20px] flex items-center justify-center py-[5px] px-5 text-[#042E00] hover:bg-[#042E00] hover:text-white transition-all duration-300">
                    Donate
                </a>

                <a href="{{ route('register') }}"
                    class="donate-btn border border-[#BDBDBD] w-full lg:w-[100px] h-10 rounded-[20px] flex items-center justify-center py-[5px] px-5 text-[#042E00] hover:bg-[#042E00] hover:text-white transition-all duration-300">
                    Join Us
                </a>

                <img src="{{ asset('images/user.svg') }}" alt="User"
                    class="w-8 h-8 mx-auto lg:mx-0 mt-3 lg:mt-0 transition-transform duration-300 hover:scale-110 cursor-pointer">
            </div>
        </div>
    </div>
</section>
