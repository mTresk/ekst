<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout.head')

<body>
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>
<div class="wrapper @yield('color')">

    @include('layout.header')

    @yield('content')

    @include('layout.footer')

</div>
@include('layout.modal')
</body>

</html>
