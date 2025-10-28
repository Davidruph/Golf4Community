<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Golf4Community - @yield('title')</title>
</head>

<body class="bg-gray-50">
    @hasSection('header')
        <header class="">
            @yield('header')
        </header>
    @endif

    {{-- <main class="container mx-auto px-2"> --}}
    @yield('content')
    {{-- </main> --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Highlight current page automatically
        const currentPath = window.location.pathname;
        document.querySelectorAll('.menu').forEach(link => {
            if (link.getAttribute('href') == currentPath) {
                link.classList.add('text-[#eb9532]', 'font-semibold', 'border-b-2', 'border-[#eb9532]');
                link.classList.remove('text-gray-900');
            }
        });

        //get state and city based on country selection
        document.getElementById('country').addEventListener('change', function() {
            const countryId = this.value;

            fetch(`/states/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    const stateSelect = document.getElementById('state');
                    stateSelect.innerHTML = '<option value="">Select your state</option>';
                    data.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.id;
                        option.textContent = state.name;
                        stateSelect.appendChild(option);
                    });
                    // Clear city dropdown
                    const citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="">Select your city</option>';
                });
        });

        //get city based on state selection
        document.getElementById('state').addEventListener('change', function() {
            const stateId = this.value;

            fetch(`/cities/${stateId}`)
                .then(response => response.json())
                .then(data => {
                    const citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="">Select your city</option>';
                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                });
        });
    </script>
</body>

</html>
