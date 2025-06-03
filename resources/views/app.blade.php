<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @inertiaHead
        @routes

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body {
                    background: #fff3f3;
                    color: #b91c1c;
                    padding: 2rem;
                    font-family: sans-serif;
                }
            </style>
            <div style="text-align:center; font-size: 1.25rem;">
                ⚠️ Vite dev server is not running.<br>
                Please run <code>npm run dev</code>.
            </div>
        @endif
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
