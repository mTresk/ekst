@extends('layout.app')

@section('color','light')

@section('content')
    <main class="page">
        <section class="post">
            <div class="post__container">
                <ul class="post__breadcrumb breadcrumb">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">
                        Политика конфиденциальности
                    </li>
                </ul>
                <div class="post__body">
                    <div class="post__wrapper">
                        <div class="post__content content">
                            {!! $content->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
