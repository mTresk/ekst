@extends('layout.app')

@section('title', $industry->name)

@section('content')
    <main class="page">
        <section class="industry-header">
            <picture>
                <source srcset="{{ $industry->getFirstMedia('industries')->getUrl('industryHeaderWebp') }}"
                        type="image/webp">
                <img class="industry-header__background"
                     src="{{ $industry->getFirstMedia('industries')->getUrl('industryHeader') }}"
                     alt="{{ $industry->name }}"/></picture>
            <div class="industry-header__container">
                <ul class="industry-header__breadcrumb breadcrumb breadcrumb--light">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('solutions.index') }}">Решения</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">
                        {{ $industry->name }}
                    </li>
                </ul>
                <h1 class="industry-header__title">Табачная продукция</h1>
            </div>
        </section>
        <section class="industry">
            <div class="industry__container">
                <div class="industry__body">
                    <div class="industry__content content">
                        {!! $industry->content !!}
                    </div>
                    <aside data-sticky data-sticky-top="90" class="industry__links sidebar-links">
                        <div data-sticky-item class="sidebar-links__wrapper">
                            <h2 class="sidebar-links__title">Другие отрасли</h2>
                            <div class="sidebar-links__body">
                                @foreach($otherIndustries as $otherIndustry)
                                    <a href="{{ route('solutions.show', $otherIndustry->slug) }}"
                                       class="sidebar-links__link">{{ $otherIndustry->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
