<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SMK 1 NAGABONAR</title>
</head>

{{-- <body class="h-screen overflow-hidden bg-gray-10 font-sans">
    <div class="min-h-full h-full">
        <!-- Header -->
        <div class="header flex items-center bg-gray-800 text-white py-4 px-6 md:px-8">
            <img src="{{ url('naga-putih.png') }}" alt="Logo" class="h-12 mr-4">
            <div class="font-bold text-lg md:text-xl">SMK 1 NAGABONAR</div>
        </div>

        <!-- Main Content -->
        <div
            class="container max-w-full lg:max-w-5xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row items-center justify-between p-4 md:p-6 lg:p-8 mt-4 md:mt-8 h-[85vh] md:h-[80vh]">
            <!-- Content Section -->
            <div class="content-section w-full md:w-3/5 text-center md:text-left mb-4 md:mb-0 overflow-y-auto">
                <div class="content-title font-bold text-lg md:text-2xl text-gray-800 mb-4 md:mb-6">
                    Selamat Datang di E-Learning SMK 1 NAGABONAR
                </div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="login-button inline-block py-2 md:py-3 px-4 md:px-6 bg-gray-800 text-white font-bold rounded-md transition-colors duration-300 hover:bg-gray-700 text-center">
                    Login
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </div>

            <!-- Illustration -->
            <div class="illustration w-full md:w-2/5 flex items-center justify-center max-h-full">
                <img src="{{ url('naga.png') }}" alt="Illustration"
                    class="max-h-60 md:max-h-full rounded-lg object-contain">
            </div>
        </div>
    </div>
</body> --}}

<body class="h-screen overflow-hidden bg-gray-10 font-sans" style="background-image: url('{{ url('bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="min-h-full h-full bg-gray-800 bg-opacity-50">
        <!-- Header -->
        <div class="header flex items-center bg-gray-800 text-white py-4 px-6 md:px-8">
            <img src="{{ url('naga-putih.png') }}" alt="Logo" class="h-12 mr-4">
            <div class="font-bold text-lg md:text-xl">SMK 1 NAGABONAR</div>
        </div>

        <!-- Main Content -->
        <div
            class="container max-w-full lg:max-w-5xl mx-auto bg-black bg-opacity-40 rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row items-center justify-between p-4 md:p-6 lg:p-8 mt-4 md:mt-8 h-[5vh] md:h-[80vh]">
            <!-- Content Section -->
            <div class="content-section w-full md:w-3/5 text-center md:text-left mb-4 md:mb-0 overflow-y-auto">
                <div class="content-title font-bold text-lg md:text-2xl text-white mb-4 md:mb-6">
                    Selamat Datang di E-Learning SMK 1 NAGABONAR
                </div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="login-button inline-block py-2 md:py-3 px-4 md:px-6 bg-gray-700 text-white font-bold rounded-md transition-colors duration-300 hover:bg-gray-800 text-center">
                    Login
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </div>

            <!-- Illustration -->
            <div class="illustration w-full md:w-2/5 flex items-center justify-center max-h-full">
                <img src="{{ url('naga-putih.png') }}" alt="Illustration"
                    class="max-h-60 md:max-h-full rounded-lg object-contain">
            </div>
        </div>
    </div>
</body>


</html>
