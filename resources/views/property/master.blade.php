<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Lara<b>Dev</b></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= url('imoveis'); ?>" class="nav-link">Listar todos os imóveis</a></li>
                <li class="nav-item"><a href="<?= url('imoveis/novo'); ?>" class="nav-link">Cadastrar novo imóvel</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>

</html>
