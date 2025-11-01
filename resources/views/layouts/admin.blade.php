<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">
    <nav>
        <!-- Menu lateral do admin -->
    </nav>

    <main class="p-4">
        @yield('admin-content')
    </main>
</body>

</html>