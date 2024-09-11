<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @stack('styles') <!-- To include additional styles if needed -->
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <!-- Navigation -->
        <nav class="bg-blue-500 p-4 rounded-lg mb-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('categories.index') }}" class="text-white font-semibold text-xl">Category Management</a>
                <div>
                        <a href="{{ route('categories.create') }}" class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-600">Create Category</a>
                   
                </div>
            </div>
        </nav>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Content -->
        @yield('content')
    </div>

    @stack('scripts') <!-- To include additional scripts if needed -->
</body>
</html>
