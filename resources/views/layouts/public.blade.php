<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Meu E-commerce</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <header>
        <!-- Menu, logo, barra de pesquisa -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer geral -->
    </footer>
</body>

</html>