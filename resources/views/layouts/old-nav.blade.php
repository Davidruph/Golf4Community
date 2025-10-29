<nav class="bg-white  w-full border-b border-gray-200">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-2">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3">
            <img src="/logo.png" class="h-20 w-auto" alt="Logo">
        </a>

        <!-- Right Buttons -->
        <div class="flex items-center space-x-3 md:order-2">
            <a href="/login"
                class="text-white bg-[#009a66] hover:bg-opacity-90 font-medium rounded-lg text-sm px-4 py-2 transition uppercase">
                Donate <i class="fa-solid fa-circle-dollar-to-slot"></i>
            </a>

            <a href="/register"
                class="text-white bg-[#eb9532] hover:bg-opacity-90 font-medium rounded-lg text-sm px-4 py-2 transition uppercase">
                Register
            </a>

            <a href="/login"
                class="text-white bg-[#009a66] hover:bg-opacity-90 font-medium rounded-lg text-sm px-4 py-2 transition uppercase">
                Login
            </a>


            <!-- Mobile menu toggle -->
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Nav links -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="/"
                        class="menu block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors uppercase">Home</a>
                </li>
                <li>
                    <a href="/about"
                        class="menu block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors active:text-[#eb9532] active:font-semibold uppercase">About</a>
                </li>
                <li>
                    <a href="/matches"
                        class="menu block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors active:text-[#eb9532] active:font-semibold uppercase">Matches</a>
                </li>
                <li>
                    <a href="/leaderboard"
                        class="block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors active:text-[#eb9532] active:font-semibold uppercase">Leaderboard</a>
                </li>
                <li>
                    <a href="/gallery"
                        class="block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors active:text-[#eb9532] active:font-semibold uppercase">Gallery</a>
                </li>
                <li>
                    <a href="/contact"
                        class="block py-2 px-3 text-gray-900 hover:text-[#eb9532] md:p-0 transition-colors active:text-[#eb9532] active:font-semibold uppercase">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
