<head>
    @if(Request::is('/'))
        <title>Институт электрокаплеструйных технологий</title>
    @else
        <title>@yield('title') - Институт электрокаплеструйных технологий</title>
    @endif

    <meta name="description"
          content="@yield('description', 'Российский лидер в области разработки, производства и обслуживания промышленных электрокаплеструйных принтеров для маркировки любой продукции')">
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">

    @vite('resources/js/app.js')
    @stack('head')
</head>
