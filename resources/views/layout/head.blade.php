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

    @vite('resources/js/app.js')
    @stack('head')
</head>
