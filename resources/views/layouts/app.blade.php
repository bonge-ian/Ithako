<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/ithako-logo.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Ithako') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Varta:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />
</head>

<body>
    <div id="app">
        @include('partials.nav')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"  ></script>
    <livewire:scripts />
    @stack('scripts')

</body>

</html>
