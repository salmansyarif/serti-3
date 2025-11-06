<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Reset margin and padding */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Body styling */
            body {
                font-family: 'Figtree', sans-serif;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); /* Gradient cool blue */
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                padding: 20px;
            }

            /* Form container styling */
            .form-container {
                background-color: rgba(0, 0, 0, 0.7); /* Slightly darker for elegance */
                padding: 1.5rem 2rem;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                max-width: 380px;
                width: 100%;
                text-align: center;
                color: #fff;
            }

            /* Header */
            .form-container h1 {
                font-size: 1.8rem;
                font-weight: bold;
                margin-bottom: 1rem;
                letter-spacing: 1px;
            }

            /* Input fields styling */
            .form-container input {
                width: 100%;
                padding: 12px;
                margin-bottom: 1.25rem;
                border-radius: 8px;
                border: 1px solid #ddd;
                background: rgba(255, 255, 255, 0.1);
                color: white;
                font-size: 1rem;
                outline: none;
                transition: 0.3s ease-in-out;
            }

            /* Focus state on input fields */
            .form-container input:focus {
                border-color: #fff;
                box-shadow: 0 0 8px rgba(75, 121, 161, 0.7);
            }

            /* Submit Button styling */
            .form-container button {
                width: 100%;
                padding: 12px;
                background: linear-gradient(90deg, #4b79a1, #283e51);
                border: none;
                border-radius: 8px;
                color: #fff;
                font-size: 1.1rem;
                cursor: pointer;
                font-weight: bold;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .form-container button:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            }

            /* Forgot password link styling */
            .form-container .text-sm {
                color: #cbd5e0;
                margin-top: 1rem;
                font-size: 0.9rem;
            }

            .form-container .text-sm a {
                color: #fff;
                text-decoration: none;
                font-weight: 600;
                transition: color 0.2s ease;
            }

            .form-container .text-sm a:hover {
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            {{ $slot }}
        </div>
    </body>
</html>
