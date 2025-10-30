<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <title>Golf4Community - @yield('title')</title>
</head>

<body>
    @hasSection('header')
        @yield('header')
    @endif

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Highlight current page
            const currentPath = window.location.pathname;
            document.querySelectorAll('.menu').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add("!border-b-2", "!border-[#042E00]");
                }
            });

            // Country change
            const country = document.getElementById('country');
            const state = document.getElementById('state');
            const city = document.getElementById('city');

            if (country) {
                country.addEventListener('change', function() {
                    const countryId = this.value;

                    fetch(`/states/${countryId}`)
                        .then(response => response.json())
                        .then(data => {
                            state.innerHTML = '<option value="">Select your state</option>';
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                state.appendChild(option);
                            });
                            city.innerHTML = '<option value="">Select your city</option>';
                        });
                });
            }

            // State change
            if (state) {
                state.addEventListener('change', function() {
                    const stateId = this.value;

                    fetch(`/cities/${stateId}`)
                        .then(response => response.json())
                        .then(data => {
                            city.innerHTML = '<option value="">Select your city</option>';
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                city.appendChild(option);
                            });
                        });
                });
            }
        });
    </script>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                menu.classList.toggle('animate-slide-down');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPassword = document.getElementById('confirmPassword');

            // Toggle main password
            if (togglePassword && password) {
                togglePassword.addEventListener('click', () => {
                    const isPassword = password.type === 'password';
                    password.type = isPassword ? 'text' : 'password';
                    document.getElementById('password-icon').classList.toggle("fa-eye")
                    document.getElementById('password-icon').classList.toggle("fa-eye-slash")
                });
            }

            // Toggle confirm password
            if (toggleConfirmPassword && confirmPassword) {
                toggleConfirmPassword.addEventListener('click', () => {
                    const isPassword = confirmPassword.type === 'password';
                    confirmPassword.type = isPassword ? 'text' : 'password';
                    document.getElementById('confirm-icon').classList.toggle("fa-eye")
                    document.getElementById('confirm-icon').classList.toggle("fa-eye-slash")
                });
            }
        });
    </script>


</body>

</html>
