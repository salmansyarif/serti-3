<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            body {
                margin: 0;
                font-family: 'Figtree', sans-serif;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
            }

            .container {
                text-align: center;
                padding: 2rem;
                background: rgba(0, 0, 0, 0.5);
                border-radius: 15px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
                backdrop-filter: blur(10px);
            }

            img {
                display: block;
                margin: 0 auto;
                max-width: 100%;
                max-height: 200px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            h1 {
                font-size: 2.5rem;
                font-weight: bold;
                text-transform: uppercase;
                margin: 1rem 0;
                color: #d1e8ff;
            }

            p {
                font-size: 1.2rem;
                margin-bottom: 2rem;
                color: #b0c4de;
            }

            a {
                display: inline-block;
                font-size: 1rem;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                text-decoration: none;
                color: #ffffff;
                background: linear-gradient(to right, #4b79a1, #283e51);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                transition: transform 0.2s, box-shadow 0.2s;
            }

            a:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Gambar di tengah -->
            <img src="images/pesat.webp" alt="pesat" />
            <!-- Tulisan "Website Perpustakaan" di bawah gambar -->
            <h1>WEBSITE PERPUSTAKAAN</h1>
            <p>Selamat Datang Di Website Perpustakaan Online</p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Login</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            @endif
        </div>
    </body>
</html>
