<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.public_name', 'One Piece') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @stack('scripts')

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @stack('styles')
</head>

<body>
<div id="app">
    <div class="dashboard-mobile_nav">
        @include('components.dashboard_navbar')
    </div>

    <main class="dashboard d-flex h-100">
        @can('manage forum')
            @include('components.dashboard_sidebar', ['dashboards' => [
                'user' => 'Utilisateur',
                'forum' => 'Forum'
            ]])
        @else
            @include('components.dashboard_sidebar', ['dashboards' => [
                'user' => 'Utilisateur',
            ]])
        @endcan


        <div class="dashboard__body flex-grow-1 h-100 px-4">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
