<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .container {
            max-width:max-content;
            margin: auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem;
        }
        .header {
            background-color: #2b3d51;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
        }
        .header img {
            height: 50px;
            margin-right: 1rem;
        }
        .header-title {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .content-section {
            width: 60%;
        }
        .content-title {
            font-weight: bold;
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .login-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #2b3d51;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .login-button:hover {
            background-color: #1f2c3b;
        }
        .illustration {
            width: 35%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .illustration img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body class="h-full bg-gray-100">
    <div class="min-h-full">
        <!-- Header -->
        <div class="header">
            <img src="https://1.bp.blogspot.com/-iPhCDfL8S_c/XohGexgk4jI/AAAAAAAAGaA/F7CsvkxOFRs0naEn_fl9ZNNQ_vaV_TZDgCLcBGAsYHQ/s1600/LOGO%2BUSMJAYA.png" alt="Logo">
            <div class="header-title">SMK 1 NAGABONAR</div>
        </div>

        <!-- Main Content -->
        <div class="container mt-8">
            <!-- Content Section -->
            <div class="content-section">
                <div class="content-title">Selamat Datang di E-Learning SMK 1 NAGABONAR</div>
                <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="login-button">
                    Login
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </div>
            
            <!-- Illustration -->
            <div class="illustration">
                <img src="https://via.placeholder.com/300" alt="Illustration">
            </div>
        </div>
    </div>
</body>
</html>
