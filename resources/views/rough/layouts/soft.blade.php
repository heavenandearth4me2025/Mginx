<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Microsoft Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <main class="min-h-screen flex items-center justify-center">
        @yield('content')
    </main>
    @livewireScripts
    
</body>
</html>