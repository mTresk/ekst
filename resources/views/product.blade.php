@extends('layout.app')

@section('color','light')

@section('content')
    <main class="page">
        <section class="product-page">
            <section class="product-page__hero product-hero">
                <div class="product-hero__container">
                    <ul class="product-hero__breadcrumb breadcrumb">
                        <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                        <li class="breadcrumb__item"><a href="{{ route('products.index') }}">Оборудование</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">
                            {{ $product->name }}
                        </li>
                    </ul>
                    <div class="product-hero__body">
                        <svg class="product-hero__decor" width="566" height="582" viewBox="0 0 566 582" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <path
                                    d="M289.395 515.57C289.395 551.737 318.722 581.049 354.891 581.049C391.061 581.049 420.387 551.737 420.387 515.57C420.387 479.41 391.061 450.091 354.891 450.091C318.722 450.091 289.395 479.41 289.395 515.57Z"
                                    fill="#0077BD"/>
                                <path
                                    d="M289.395 65.4723C289.395 101.64 318.722 130.952 354.891 130.952C391.061 130.952 420.387 101.64 420.387 65.4723C420.387 29.3121 391.061 0 354.891 0C318.722 0 289.395 29.3121 289.395 65.4723Z"
                                    fill="#373535"/>
                                <path
                                    d="M144.699 65.4723C144.699 101.64 174.019 130.952 210.189 130.952C246.365 130.952 275.685 101.64 275.685 65.4723C275.685 29.3121 246.365 0 210.189 0C174.019 0 144.699 29.3121 144.699 65.4723Z"
                                    fill="#373535"/>
                                <path
                                    d="M-0.000701904 65.4723C-0.000701904 101.64 29.3189 130.952 65.4953 130.952C101.665 130.952 130.984 101.64 130.984 65.4723C130.984 29.3121 101.665 0 65.4953 0C29.3189 0 -0.000701904 29.3121 -0.000701904 65.4723Z"
                                    fill="#373535"/>
                                <path
                                    d="M434.095 215.507C434.095 251.668 463.422 280.98 499.591 280.98C535.76 280.98 565.08 251.668 565.08 215.507C565.08 179.347 535.76 150.028 499.591 150.028C463.422 150.028 434.095 179.347 434.095 215.507Z"
                                    fill="#0077BD"/>
                                <path
                                    d="M289.395 215.508C289.395 251.668 318.722 280.98 354.891 280.98C391.061 280.98 420.387 251.668 420.387 215.508C420.387 179.347 391.061 150.028 354.891 150.028C318.722 150.028 289.395 179.347 289.395 215.508Z"
                                    fill="#0077BD"/>
                                <path
                                    d="M144.699 215.507C144.699 251.668 174.019 280.98 210.189 280.98C246.365 280.98 275.685 251.668 275.685 215.507C275.685 179.347 246.365 150.028 210.189 150.028C174.019 150.028 144.699 179.347 144.699 215.507Z"
                                    fill="#0077BD"/>
                                <path
                                    d="M289.395 365.538C289.395 401.705 318.722 431.018 354.891 431.018C391.061 431.018 420.387 401.705 420.387 365.538C420.387 329.378 391.061 300.066 354.891 300.066C318.722 300.066 289.395 329.378 289.395 365.538Z"
                                    fill="#0077BD"/>
                                <path
                                    d="M144.699 365.538C144.699 401.705 174.019 431.018 210.189 431.018C246.365 431.018 275.685 401.705 275.685 365.538C275.685 329.378 246.365 300.066 210.189 300.066C174.019 300.066 144.699 329.378 144.699 365.538Z"
                                    fill="#373535"/>
                            </g>
                        </svg>
                        <div class="product-hero__content">
                            <h1 class="product-hero__title">{{ $product->name }}</h1>
                            @isset($product->short_description)
                                <p class="product-hero__description">
                                    {{ $product->short_description }}
                                </p>
                            @endisset
                            <button data-popup="#popup" class="product-hero__button button">
                                Сделать заказ
                            </button>
                        </div>
                        @isset($product->getMedia('products')[0])
                            <div class="product-hero__image">
                                <picture>
                                    <source
                                        srcset="{{ $product->getFirstMedia('products')->getUrl('productWebp') }} 1x, {{ $product->getFirstMedia('products')->getUrl('productWebp@2') }} 2x"
                                        type="image/webp">
                                    <img src="{{ $product->getFirstMedia('products')->getUrl('product') }}"
                                         srcset="{{ $product->getFirstMedia('products')->getUrl('productWebp') }} 1x, {{ $product->getFirstMedia('products')->getUrl('productWebp@2') }} 2x"
                                         alt="{{ $product->name }}"/></picture>
                            </div>
                        @endisset
                        @isset($product->video)
                            <button data-popup="#youtube" data-popup-youtube="{{ $product->video }}"
                                    class="product-hero__video-button video-button">
                                <div class="video-button__button">
                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.2861 6.00007L0.857561 11.4437L0.857561 0.556481L10.2861 6.00007Z"
                                              fill="#0077BD"/>
                                    </svg>
                                </div>
                                <div class="video-button__text">Видео</div>
                            </button>
                        @endisset
                    </div>
                </div>
            </section>
            <section class="product-page__content product-content">
                <div class="product-content__container">
                    <div class="product-content__body">
                        <div class="product-content__wrapper">
                            <div class="product-content__description content">
                                <h2>Описание</h2>
                                <p>
                                    {{ $product->description }}
                                </p>
                            </div>
                            @isset($product->getMedia('sliders')[0])
                                <div class="product-content__sliders">
                                    <div class="product-content__slider swiper">
                                        <div class="product-content__wrapper swiper-wrapper">
                                            @foreach($product->getMedia('sliders') as $slide)
                                                <div class="product-content__slide swiper-slide">
                                                    <picture>
                                                        <source
                                                            srcset="{{ $slide->getUrl('sliderWebp') }} 1x, {{ $slide->getUrl('sliderWebp@2') }} 2x"
                                                            type="image/webp">
                                                        <img src="{{ $slide->getUrl('slider') }}"
                                                             srcset="{{ $slide->getUrl('sliderWebp') }} 1x, {{ $slide->getUrl('sliderWebp@2') }} 2x"
                                                             alt="{{ $product->name }}"/></picture>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-content__thumbs thumbs">
                                        <div class="thumbs__slider swiper">
                                            <div class="thumbs__wrapper swiper-wrapper">
                                                @isset($product->getMedia('sliders')[0])
                                                    @foreach($product->getMedia('sliders') as $slide)
                                                        <div class="thumbs__slide swiper-slide">
                                                            <picture>
                                                                <source
                                                                    srcset="{{ $slide->getUrl('sliderThumbWebp') }} 1x, {{ $slide->getUrl('sliderThumbWebp@2') }} 2x"
                                                                    type="image/webp">
                                                                <img src="{{ $slide->getUrl('sliderThumb') }}"
                                                                     srcset="{{ $slide->getUrl('sliderThumbWebp') }} 1x, {{ $slide->getUrl('sliderThumbWebp@2') }} 2x"
                                                                     alt="{{ $product->name }}"/></picture>
                                                        </div>
                                                    @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                        <nav class="thumbs__navigation">
                                            <button aria-label="Назад" class="thumbs__button thumbs__button--prev">
                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.626065 7.29289C0.23554 7.68342 0.23554 8.31658 0.626065 8.70711L6.99003 15.0711C7.38055 15.4616 8.01371 15.4616 8.40424 15.0711C8.79476 14.6805 8.79476 14.0474 8.40424 13.6569L2.74739 8L8.40424 2.34315C8.79476 1.95262 8.79476 1.31946 8.40424 0.928932C8.01372 0.538407 7.38055 0.538407 6.99003 0.928932L0.626065 7.29289ZM14.6665 7L1.33317 7L1.33317 9L14.6665 9L14.6665 7Z"
                                                        fill="white"/>
                                                </svg>
                                            </button>
                                            <button aria-label="Вперед" class="thumbs__button thumbs__button--next">
                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.3739 8.70711C14.7645 8.31658 14.7645 7.68342 14.3739 7.29289L8.00997 0.928932C7.61945 0.538408 6.98628 0.538408 6.59576 0.928932C6.20524 1.31946 6.20524 1.95262 6.59576 2.34315L12.2526 8L6.59576 13.6569C6.20524 14.0474 6.20524 14.6805 6.59576 15.0711C6.98628 15.4616 7.61945 15.4616 8.00997 15.0711L14.3739 8.70711ZM0.333496 9H13.6668V7H0.333496V9Z"
                                                        fill="white"/>
                                                </svg>
                                            </button>
                                        </nav>
                                    </div>
                                </div>
                            @endisset
                            @isset($product->facilities)
                                <div data-spollers class="product-content__spoilers spoilers">
                                    @foreach($product->facilities as $facility)
                                        <div class="spoilers__item">
                                            <button type="button" data-spoller class="spoilers__title">
                                                <span>{{ $facility['title'] }}</span>
                                                <svg class="spoilers__arrow" width="16" height="9" viewBox="0 0 16 9"
                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.29582 8.70711C7.68635 9.09763 8.31951 9.09763 8.71004 8.70711L15.074 2.34315C15.4645 1.95262 15.4645 1.31946 15.074 0.928933C14.6835 0.538409 14.0503 0.538409 13.6598 0.928933L8.00293 6.58579L2.34608 0.928933C1.95555 0.538409 1.32239 0.538409 0.931863 0.928933C0.541339 1.31946 0.541339 1.95262 0.931863 2.34315L7.29582 8.70711ZM7.00293 7V8H9.00293V7H7.00293Z"
                                                        fill="white"/>
                                                </svg>
                                            </button>
                                            <div class="spoilers__body content">
                                                {!!  $facility['content'] !!}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endisset
                            <div class="product-content__table content">
                                {!! $product->content !!}
                            </div>
                        </div>
                        <aside data-sticky data-sticky-top="90" class="product-content__links sidebar-links">
                            <div data-sticky-item class="sidebar-links__wrapper">
                                <h2 class="sidebar-links__title">Другое оборудование</h2>
                                <div class="sidebar-links__body">
                                    @foreach($otherProducts as $otherProduct)
                                        <a href="{{ route('products.show', $otherProduct->slug) }}"
                                           class="sidebar-links__link">{{ $otherProduct->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection
