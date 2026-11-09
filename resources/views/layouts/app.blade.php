<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Barangay Bulletin – Purok Casia')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
    <header class="bg-[#0d5421] text-white shadow">
        <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6">
            <a href="{{ route('posts.index') }}" class="text-2xl font-bold">Barangay Bulletin – Purok Casia</a>
            <p class="mt-1 text-green-100">Matina Crossing Hall announcements</p>
        </div>
    </header>
    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">
        @yield('content')
    </main>
</body>
</html>
