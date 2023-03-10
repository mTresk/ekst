@extends('layout.app')

@section('color', 'light')
@section('title', 'О компании')
@section('description', $about->about)

@section('content')
    <main class="page">
        <section class="about-hero">
            <svg class="about-hero__decor" width="805" height="218" viewBox="0 0 805 218" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.05">
                    <path
                        d="M104.556 193.433C104.556 207.003 93.4334 218 79.716 218C65.9985 218 54.8762 207.003 54.8762 193.433C54.8762 179.867 65.9985 168.866 79.716 168.866C93.4334 168.866 104.556 179.867 104.556 193.433Z"
                        fill="#0077BD"/>
                    <path
                        d="M104.556 24.5641C104.556 38.1334 93.4334 49.1309 79.716 49.1309C65.9985 49.1309 54.8762 38.1334 54.8762 24.5641C54.8762 10.9974 65.9985 -5.34058e-05 79.716 -5.34058e-05C93.4334 -5.34058e-05 104.556 10.9974 104.556 24.5641Z"
                        fill="#373535"/>
                    <path
                        d="M159.429 24.5643C159.429 38.1337 148.309 49.1311 134.592 49.1311C120.872 49.1311 109.752 38.1337 109.752 24.5643C109.752 10.9976 120.872 0.000190735 134.592 0.000190735C148.309 0.000190735 159.429 10.9976 159.429 24.5643Z"
                        fill="#373535"/>
                    <path
                        d="M214.311 24.5643C214.311 38.1337 203.191 49.1311 189.471 49.1311C175.753 49.1311 164.634 38.1337 164.634 24.5643C164.634 10.9976 175.753 0.000190735 189.471 0.000190735C203.191 0.000190735 214.311 10.9976 214.311 24.5643Z"
                        fill="#373535"/>
                    <path
                        d="M49.6768 80.8546C49.6768 94.4213 38.5546 105.419 24.8371 105.419C11.1196 105.419 0 94.4213 0 80.8546C0 67.2878 11.1196 56.2878 24.8371 56.2878C38.5546 56.2878 49.6768 67.2878 49.6768 80.8546Z"
                        fill="#0077BD"/>
                    <path
                        d="M104.556 80.8546C104.556 94.4213 93.4334 105.419 79.716 105.419C65.9985 105.419 54.8762 94.4213 54.8762 80.8546C54.8762 67.2878 65.9985 56.2878 79.716 56.2878C93.4334 56.2878 104.556 67.2878 104.556 80.8546Z"
                        fill="#0077BD"/>
                    <path
                        d="M159.429 80.8548C159.429 94.4215 148.309 105.419 134.592 105.419C120.872 105.419 109.752 94.4215 109.752 80.8548C109.752 67.2881 120.872 56.288 134.592 56.288C148.309 56.288 159.429 67.2881 159.429 80.8548Z"
                        fill="#0077BD"/>
                    <path
                        d="M104.556 137.144C104.556 150.713 93.4334 161.711 79.716 161.711C65.9985 161.711 54.8762 150.713 54.8762 137.144C54.8762 123.577 65.9985 112.58 79.716 112.58C93.4334 112.58 104.556 123.577 104.556 137.144Z"
                        fill="#0077BD"/>
                    <path
                        d="M159.429 137.144C159.429 150.713 148.309 161.711 134.592 161.711C120.872 161.711 109.752 150.713 109.752 137.144C109.752 123.577 120.872 112.58 134.592 112.58C148.309 112.58 159.429 123.577 159.429 137.144Z"
                        fill="#373535"/>
                    <path
                        d="M443.856 111.941V197.966H433.759V20.368H443.856V95.9566L501.208 20.368H514.226L460.354 91.8499L529.943 197.966H517.483L453.734 99.8407L443.856 111.941Z"
                        fill="#373535"/>
                    <path
                        d="M676.928 171.769L684.557 178.54C667.053 194.304 646.434 202.182 622.717 202.182C597.279 202.182 575.596 193.322 557.679 175.598C539.759 157.878 530.8 136.436 530.8 111.274C530.8 86.189 539.759 64.7677 557.679 47.0053C575.596 29.2481 597.279 20.3669 622.717 20.3669C646.434 20.3669 667.053 28.2476 684.557 44.0091L676.928 50.892C661.513 37.3488 643.439 30.5786 622.717 30.5786C600.195 30.5786 580.967 38.4593 565.033 54.2208C549.096 69.9823 541.125 89.0019 541.125 111.274C541.125 133.625 549.096 152.676 565.033 168.441C580.967 184.199 600.195 192.083 622.717 192.083C643.439 192.083 661.513 185.313 676.928 171.769Z"
                        fill="#373535"/>
                    <path d="M759.206 30.3561V197.965H749.103V30.3561H703.65V20.367H804.659V30.3561H759.206Z"
                          fill="#373535"/>
                    <path
                        d="M309.776 86.5187C310.488 86.5187 311.19 86.5658 311.881 86.6339C312.099 86.6575 312.313 86.6915 312.528 86.7203C313.009 86.7832 313.486 86.8618 313.958 86.9587C314.191 87.0058 314.421 87.0556 314.649 87.1106C315.133 87.2284 315.61 87.3646 316.079 87.5139C316.259 87.5715 316.442 87.6187 316.616 87.6815C317.231 87.8963 317.832 88.1399 318.42 88.4096C318.616 88.4987 318.804 88.6034 318.997 88.7003C319.394 88.8994 319.786 89.1037 320.17 89.3263C320.403 89.4651 320.634 89.6065 320.861 89.7506C321.195 89.9627 321.523 90.188 321.846 90.4211C322.064 90.5782 322.283 90.7301 322.495 90.8951C322.551 90.937 322.609 90.9763 322.662 91.0182C322.689 91.047 322.718 91.0758 322.744 91.1073C323.719 91.893 324.635 92.7468 325.448 93.6923L325.533 93.6975C332.217 100.093 341.305 104.043 351.339 104.043C359.572 104.043 367.154 101.361 373.311 96.8823H373.329C374.648 95.8478 376.181 95.0856 377.834 94.6089C378.093 94.533 378.353 94.4623 378.618 94.3994C378.893 94.3392 379.166 94.2816 379.447 94.237C380.061 94.1401 380.688 94.072 381.335 94.072C388.493 94.072 394.295 99.8104 394.295 106.89C394.295 113.969 388.493 119.707 381.335 119.707C380.688 119.707 380.061 119.639 379.447 119.542C379.166 119.498 378.893 119.44 378.618 119.38C378.353 119.32 378.093 119.249 377.834 119.17C376.181 118.694 374.648 117.934 373.329 116.897L373.311 116.9C367.154 112.419 359.572 109.737 351.339 109.737C341.305 109.737 332.217 113.689 325.533 120.082L325.448 120.087C324.635 121.033 323.719 121.886 322.744 122.672C322.718 122.704 322.689 122.732 322.662 122.761C322.609 122.806 322.551 122.842 322.495 122.884C322.283 123.049 322.064 123.201 321.846 123.361C321.523 123.591 321.195 123.817 320.861 124.029C320.634 124.173 320.403 124.317 320.17 124.453C319.786 124.676 319.394 124.883 318.997 125.079C318.804 125.176 318.616 125.281 318.42 125.37C317.832 125.642 317.231 125.886 316.616 126.1C316.442 126.161 316.259 126.208 316.079 126.265C315.61 126.417 315.133 126.554 314.649 126.671C314.421 126.724 314.191 126.774 313.958 126.821C313.486 126.918 313.009 126.996 312.53 127.062C312.313 127.091 312.099 127.122 311.881 127.143C311.19 127.216 310.488 127.261 309.776 127.261C298.402 127.261 289.179 118.141 289.179 106.89C289.179 95.6382 298.402 86.5187 309.776 86.5187Z"
                        fill="#0077BD"/>
                    <path
                        d="M400.296 111.829C399.247 132.03 391.316 149.457 376.502 164.108C360.491 179.946 341.223 187.863 318.701 187.863C296.104 187.863 276.802 179.946 260.791 164.108C252.11 155.675 245.789 146.238 241.825 135.807H230.938C235.276 148.978 242.757 160.779 253.384 171.211C271.415 189.047 293.189 197.965 318.701 197.965C344.068 197.965 365.745 189.086 383.742 171.324C401.734 153.564 410.732 132.069 410.732 106.835C410.732 81.676 401.734 60.2129 383.742 42.4556C365.745 24.6932 344.068 15.8146 318.701 15.8146C293.189 15.8146 271.415 24.6591 253.384 42.343C248.143 47.6702 243.657 53.2226 239.915 58.9924H252.486C254.954 55.8129 257.722 52.704 260.791 49.6685C276.802 33.8337 296.104 25.9163 318.701 25.9163C341.223 25.9163 360.491 33.8337 376.502 49.6685C391.316 64.3195 399.247 81.7101 400.296 101.84"
                        fill="#373535"/>
                </g>
            </svg>
            <div class="about-hero__container">
                <ul class="about-hero__breadcrumb breadcrumb">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">О нас</li>
                </ul>
                <div class="about-hero__body">
                    <div class="about-hero__content">
                        <h1 class="about-hero__title">О нас</h1>
                        <p class="about-hero__text">
                            {{ $about->about }}
                        </p>
                    </div>
                    <div class="about-hero__image">
                        <picture>
                            <source
                                srcset="{{ asset('img/about/hero@2x.webp') }} 2x, {{ asset('img/about/hero.webp') }} 1x"
                                type="image/webp">
                            <img srcset="{{ asset('img/about/hero@2x.png') }} 2x, {{ asset('img/about/hero.png') }} 1x"
                                 src="{{asset('img/about/hero.png')}}" alt="Коллаж"/></picture>
                    </div>
                </div>
            </div>
        </section>
        <section animate class="numbers numbers--about">
            <div class="numbers__container">
                <div class="numbers__body">
                    @foreach($numbers as $number)
                        <div animate class="numbers__item numbers-item">
                            <div class="numbers-item__number">
                            <span class="purecounter" data-purecounter-start="0"
                                  data-purecounter-end="{{ $number->number }}"
                                  data-purecounter-delay="3"
                                  data-purecounter-duration="1.3">{{ $number->number }}</span>+
                            </div>
                            <p class="numbers-item__text">
                                {{ $number->text }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section animate class="about-history">
            <div class="about-history__container">
                <h2 animate class="about-history__title title-h2">
                    <svg class="title-h2__icon" width="49" height="50" viewBox="0 0 49 50" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7169 44.3654C23.7169 47.4777 21.194 50 18.0823 50C14.9707 50 12.4478 47.4777 12.4478 44.3654C12.4478 41.2538 14.9707 38.7308 18.0823 38.7308C21.194 38.7308 23.7169 41.2538 23.7169 44.3654Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 5.63397C23.7169 8.74621 21.194 11.2686 18.0823 11.2686C14.9707 11.2686 12.4478 8.74621 12.4478 5.63397C12.4478 2.52234 14.9707 -3.8147e-06 18.0823 -3.8147e-06C21.194 -3.8147e-06 23.7169 2.52234 23.7169 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M36.165 5.63397C36.165 8.74621 33.6427 11.2686 30.5311 11.2686C27.4188 11.2686 24.8965 8.74621 24.8965 5.63397C24.8965 2.52234 27.4188 -3.8147e-06 30.5311 -3.8147e-06C33.6427 -3.8147e-06 36.165 2.52234 36.165 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M48.6133 5.63397C48.6133 8.74621 46.0909 11.2686 42.9787 11.2686C39.8671 11.2686 37.3447 8.74621 37.3447 5.63397C37.3447 2.52234 39.8671 -3.8147e-06 42.9787 -3.8147e-06C46.0909 -3.8147e-06 48.6133 2.52234 48.6133 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M11.2686 18.5447C11.2686 21.6564 8.74561 24.1787 5.63398 24.1787C2.52235 24.1787 0 21.6564 0 18.5447C0 15.4331 2.52235 12.9102 5.63398 12.9102C8.74561 12.9102 11.2686 15.4331 11.2686 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 18.5447C23.7169 21.6564 21.194 24.1787 18.0823 24.1787C14.9707 24.1787 12.4478 21.6564 12.4478 18.5447C12.4478 15.4331 14.9707 12.9102 18.0823 12.9102C21.194 12.9102 23.7169 15.4331 23.7169 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 18.5447C36.165 21.6564 33.6427 24.1787 30.5311 24.1787C27.4188 24.1787 24.8965 21.6564 24.8965 18.5447C24.8965 15.4331 27.4188 12.9102 30.5311 12.9102C33.6427 12.9102 36.165 15.4331 36.165 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 31.455C23.7169 34.5673 21.194 37.0896 18.0823 37.0896C14.9707 37.0896 12.4478 34.5673 12.4478 31.455C12.4478 28.3434 14.9707 25.821 18.0823 25.821C21.194 25.821 23.7169 28.3434 23.7169 31.455Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 31.455C36.165 34.5673 33.6427 37.0896 30.5311 37.0896C27.4188 37.0896 24.8965 34.5673 24.8965 31.455C24.8965 28.3434 27.4188 25.821 30.5311 25.821C33.6427 25.821 36.165 28.3434 36.165 31.455Z"
                            fill="#373535"/>
                    </svg>
                    <div class="title-h2__content"><span>История</span> <br/>компании</div>
                </h2>
                <div class="about-history__body">
                    @foreach($history[0]['period'] as $item )
                        <div animate class="about-history__item @if($loop->even)about-history__item--inverted @endif">
                            <div class="about-history__year">{{ $item['year'] }}</div>
                            <p class="about-history__text">
                                {{ $item['event'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section animate class="article">
            <div class="article__container">
                <h2 animate class="article__title title-h2">
                    <svg class="title-h2__icon" width="49" height="50" viewBox="0 0 49 50" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7169 44.3654C23.7169 47.4777 21.194 50 18.0823 50C14.9707 50 12.4478 47.4777 12.4478 44.3654C12.4478 41.2538 14.9707 38.7308 18.0823 38.7308C21.194 38.7308 23.7169 41.2538 23.7169 44.3654Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 5.63397C23.7169 8.74621 21.194 11.2686 18.0823 11.2686C14.9707 11.2686 12.4478 8.74621 12.4478 5.63397C12.4478 2.52234 14.9707 -3.8147e-06 18.0823 -3.8147e-06C21.194 -3.8147e-06 23.7169 2.52234 23.7169 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M36.165 5.63397C36.165 8.74621 33.6427 11.2686 30.5311 11.2686C27.4188 11.2686 24.8965 8.74621 24.8965 5.63397C24.8965 2.52234 27.4188 -3.8147e-06 30.5311 -3.8147e-06C33.6427 -3.8147e-06 36.165 2.52234 36.165 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M48.6133 5.63397C48.6133 8.74621 46.0909 11.2686 42.9787 11.2686C39.8671 11.2686 37.3447 8.74621 37.3447 5.63397C37.3447 2.52234 39.8671 -3.8147e-06 42.9787 -3.8147e-06C46.0909 -3.8147e-06 48.6133 2.52234 48.6133 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M11.2686 18.5447C11.2686 21.6564 8.74561 24.1787 5.63398 24.1787C2.52235 24.1787 0 21.6564 0 18.5447C0 15.4331 2.52235 12.9102 5.63398 12.9102C8.74561 12.9102 11.2686 15.4331 11.2686 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 18.5447C23.7169 21.6564 21.194 24.1787 18.0823 24.1787C14.9707 24.1787 12.4478 21.6564 12.4478 18.5447C12.4478 15.4331 14.9707 12.9102 18.0823 12.9102C21.194 12.9102 23.7169 15.4331 23.7169 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 18.5447C36.165 21.6564 33.6427 24.1787 30.5311 24.1787C27.4188 24.1787 24.8965 21.6564 24.8965 18.5447C24.8965 15.4331 27.4188 12.9102 30.5311 12.9102C33.6427 12.9102 36.165 15.4331 36.165 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 31.455C23.7169 34.5673 21.194 37.0896 18.0823 37.0896C14.9707 37.0896 12.4478 34.5673 12.4478 31.455C12.4478 28.3434 14.9707 25.821 18.0823 25.821C21.194 25.821 23.7169 28.3434 23.7169 31.455Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 31.455C36.165 34.5673 33.6427 37.0896 30.5311 37.0896C27.4188 37.0896 24.8965 34.5673 24.8965 31.455C24.8965 28.3434 27.4188 25.821 30.5311 25.821C33.6427 25.821 36.165 28.3434 36.165 31.455Z"
                            fill="#373535"/>
                    </svg>
                    <div class="title-h2__content">Статья об <br/><span>основателе компании</span></div>
                </h2>
                <div animate class="article__content content">
                    {!! $about->article !!}
                </div>
            </div>
        </section>
        <section animate class="testimonials">
            <div class="testimonials__container">
                <h2 animate class="testimonials__title title-h2">
                    <svg class="title-h2__icon" width="49" height="50" viewBox="0 0 49 50" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7169 44.3654C23.7169 47.4777 21.194 50 18.0823 50C14.9707 50 12.4478 47.4777 12.4478 44.3654C12.4478 41.2538 14.9707 38.7308 18.0823 38.7308C21.194 38.7308 23.7169 41.2538 23.7169 44.3654Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 5.63397C23.7169 8.74621 21.194 11.2686 18.0823 11.2686C14.9707 11.2686 12.4478 8.74621 12.4478 5.63397C12.4478 2.52234 14.9707 -3.8147e-06 18.0823 -3.8147e-06C21.194 -3.8147e-06 23.7169 2.52234 23.7169 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M36.165 5.63397C36.165 8.74621 33.6427 11.2686 30.5311 11.2686C27.4188 11.2686 24.8965 8.74621 24.8965 5.63397C24.8965 2.52234 27.4188 -3.8147e-06 30.5311 -3.8147e-06C33.6427 -3.8147e-06 36.165 2.52234 36.165 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M48.6133 5.63397C48.6133 8.74621 46.0909 11.2686 42.9787 11.2686C39.8671 11.2686 37.3447 8.74621 37.3447 5.63397C37.3447 2.52234 39.8671 -3.8147e-06 42.9787 -3.8147e-06C46.0909 -3.8147e-06 48.6133 2.52234 48.6133 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M11.2686 18.5447C11.2686 21.6564 8.74561 24.1787 5.63398 24.1787C2.52235 24.1787 0 21.6564 0 18.5447C0 15.4331 2.52235 12.9102 5.63398 12.9102C8.74561 12.9102 11.2686 15.4331 11.2686 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 18.5447C23.7169 21.6564 21.194 24.1787 18.0823 24.1787C14.9707 24.1787 12.4478 21.6564 12.4478 18.5447C12.4478 15.4331 14.9707 12.9102 18.0823 12.9102C21.194 12.9102 23.7169 15.4331 23.7169 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 18.5447C36.165 21.6564 33.6427 24.1787 30.5311 24.1787C27.4188 24.1787 24.8965 21.6564 24.8965 18.5447C24.8965 15.4331 27.4188 12.9102 30.5311 12.9102C33.6427 12.9102 36.165 15.4331 36.165 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 31.455C23.7169 34.5673 21.194 37.0896 18.0823 37.0896C14.9707 37.0896 12.4478 34.5673 12.4478 31.455C12.4478 28.3434 14.9707 25.821 18.0823 25.821C21.194 25.821 23.7169 28.3434 23.7169 31.455Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 31.455C36.165 34.5673 33.6427 37.0896 30.5311 37.0896C27.4188 37.0896 24.8965 34.5673 24.8965 31.455C24.8965 28.3434 27.4188 25.821 30.5311 25.821C33.6427 25.821 36.165 28.3434 36.165 31.455Z"
                            fill="#373535"/>
                    </svg>
                    <div class="title-h2__content">Отзывы <br/><span>наших клиентов</span></div>
                </h2>
                <div class="testimonials__body">
                    <div class="testimonials__slider swiper">
                        <div class="testimonials__wrapper swiper-wrapper">
                            @foreach($reviews as $review)
                                <div animate class="testimonials__slide swiper-slide testimonial">
                                    <div class="testimonial__name">{{ $review->name }}</div>
                                    <div
                                        class="testimonial__date">
                                        от {{ \Carbon\Carbon::parse($review->created_at)->format('d.m.Y') }}</div>
                                    <p class="testimonial__text">
                                        {{ $review->text }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="testimonials__footer">
                        <button animate type="button" data-popup="#testimonial" class="testimonials__acton button">
                            Оставить отзыв
                        </button>
                        <div animate class="testimonials__pagination"></div>
                        <nav animate class="testimonials__navigation">
                            <button aria-label="Назад" class="testimonials__button testimonials__button--prev">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.626065 7.29289C0.23554 7.68342 0.23554 8.31658 0.626065 8.70711L6.99003 15.0711C7.38055 15.4616 8.01371 15.4616 8.40424 15.0711C8.79476 14.6805 8.79476 14.0474 8.40424 13.6569L2.74739 8L8.40424 2.34315C8.79476 1.95262 8.79476 1.31946 8.40424 0.928932C8.01372 0.538407 7.38055 0.538407 6.99003 0.928932L0.626065 7.29289ZM14.6665 7L1.33317 7L1.33317 9L14.6665 9L14.6665 7Z"
                                        fill="white"/>
                                </svg>
                            </button>
                            <button aria-label="Вперед" class="testimonials__button testimonials__button--next">
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
            </div>
        </section>
        <section animate class="documents">
            <div class="documents__container">
                <h2 animate animate class="documents__title title-h2">
                    <svg class="title-h2__icon" width="49" height="50" viewBox="0 0 49 50" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7169 44.3654C23.7169 47.4777 21.194 50 18.0823 50C14.9707 50 12.4478 47.4777 12.4478 44.3654C12.4478 41.2538 14.9707 38.7308 18.0823 38.7308C21.194 38.7308 23.7169 41.2538 23.7169 44.3654Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 5.63397C23.7169 8.74621 21.194 11.2686 18.0823 11.2686C14.9707 11.2686 12.4478 8.74621 12.4478 5.63397C12.4478 2.52234 14.9707 -3.8147e-06 18.0823 -3.8147e-06C21.194 -3.8147e-06 23.7169 2.52234 23.7169 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M36.165 5.63397C36.165 8.74621 33.6427 11.2686 30.5311 11.2686C27.4188 11.2686 24.8965 8.74621 24.8965 5.63397C24.8965 2.52234 27.4188 -3.8147e-06 30.5311 -3.8147e-06C33.6427 -3.8147e-06 36.165 2.52234 36.165 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M48.6133 5.63397C48.6133 8.74621 46.0909 11.2686 42.9787 11.2686C39.8671 11.2686 37.3447 8.74621 37.3447 5.63397C37.3447 2.52234 39.8671 -3.8147e-06 42.9787 -3.8147e-06C46.0909 -3.8147e-06 48.6133 2.52234 48.6133 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M11.2686 18.5447C11.2686 21.6564 8.74561 24.1787 5.63398 24.1787C2.52235 24.1787 0 21.6564 0 18.5447C0 15.4331 2.52235 12.9102 5.63398 12.9102C8.74561 12.9102 11.2686 15.4331 11.2686 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 18.5447C23.7169 21.6564 21.194 24.1787 18.0823 24.1787C14.9707 24.1787 12.4478 21.6564 12.4478 18.5447C12.4478 15.4331 14.9707 12.9102 18.0823 12.9102C21.194 12.9102 23.7169 15.4331 23.7169 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 18.5447C36.165 21.6564 33.6427 24.1787 30.5311 24.1787C27.4188 24.1787 24.8965 21.6564 24.8965 18.5447C24.8965 15.4331 27.4188 12.9102 30.5311 12.9102C33.6427 12.9102 36.165 15.4331 36.165 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 31.455C23.7169 34.5673 21.194 37.0896 18.0823 37.0896C14.9707 37.0896 12.4478 34.5673 12.4478 31.455C12.4478 28.3434 14.9707 25.821 18.0823 25.821C21.194 25.821 23.7169 28.3434 23.7169 31.455Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 31.455C36.165 34.5673 33.6427 37.0896 30.5311 37.0896C27.4188 37.0896 24.8965 34.5673 24.8965 31.455C24.8965 28.3434 27.4188 25.821 30.5311 25.821C33.6427 25.821 36.165 28.3434 36.165 31.455Z"
                            fill="#373535"/>
                    </svg>
                    <div class="title-h2__content">Документы</div>
                </h2>
                <div class="documents__body">
                    @foreach($documents as $document)
                        <div animate class="documents__item document">
                            <a href="/storage/{{ $document->url }}" download class="document__link">
                                <svg class="document__icon" width="50" height="34" viewBox="0 0 50 34" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M40.3125 12.5833C39.6127 9.03691 37.7033 5.84346 34.9106 3.54843C32.1178 1.2534 28.6148 -0.000817172 25 3.99451e-07C18.9792 3.99451e-07 13.75 3.41667 11.1458 8.41667C8.08382 8.74757 5.2521 10.1983 3.19477 12.4903C1.13744 14.7822 -0.000357712 17.7535 8.43599e-08 20.8333C8.43599e-08 27.7292 5.60417 33.3333 12.5 33.3333H39.5833C45.3333 33.3333 50 28.6667 50 22.9167C50 17.4167 45.7292 12.9583 40.3125 12.5833ZM39.5833 29.1667H12.5C7.89583 29.1667 4.16667 25.4375 4.16667 20.8333C4.16667 16.5625 7.35417 13 11.5833 12.5625L13.8125 12.3333L14.8542 10.3542C15.8122 8.48912 17.2664 6.92461 19.0565 5.8329C20.8466 4.7412 22.9033 4.16462 25 4.16667C30.4583 4.16667 35.1667 8.04167 36.2292 13.3958L36.8542 16.5208L40.0417 16.75C41.6078 16.8553 43.0759 17.55 44.1505 18.6941C45.225 19.8383 45.8263 21.347 45.8333 22.9167C45.8333 26.3542 43.0208 29.1667 39.5833 29.1667ZM28.0208 12.5H21.9792V18.75H16.6667L25 27.0833L33.3333 18.75H28.0208V12.5Z"
                                        fill="#0077BD"/>
                                </svg>
                                <span>{{ $document->name }}</span></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section animate class="why">
            <div class="why__container">
                <h2 animate class="why__title title-h2">
                    <svg class="title-h2__icon" width="49" height="50" viewBox="0 0 49 50" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7169 44.3654C23.7169 47.4777 21.194 50 18.0823 50C14.9707 50 12.4478 47.4777 12.4478 44.3654C12.4478 41.2538 14.9707 38.7308 18.0823 38.7308C21.194 38.7308 23.7169 41.2538 23.7169 44.3654Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 5.63397C23.7169 8.74621 21.194 11.2686 18.0823 11.2686C14.9707 11.2686 12.4478 8.74621 12.4478 5.63397C12.4478 2.52234 14.9707 -3.8147e-06 18.0823 -3.8147e-06C21.194 -3.8147e-06 23.7169 2.52234 23.7169 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M36.165 5.63397C36.165 8.74621 33.6427 11.2686 30.5311 11.2686C27.4188 11.2686 24.8965 8.74621 24.8965 5.63397C24.8965 2.52234 27.4188 -3.8147e-06 30.5311 -3.8147e-06C33.6427 -3.8147e-06 36.165 2.52234 36.165 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M48.6133 5.63397C48.6133 8.74621 46.0909 11.2686 42.9787 11.2686C39.8671 11.2686 37.3447 8.74621 37.3447 5.63397C37.3447 2.52234 39.8671 -3.8147e-06 42.9787 -3.8147e-06C46.0909 -3.8147e-06 48.6133 2.52234 48.6133 5.63397Z"
                            fill="#373535"/>
                        <path
                            d="M11.2686 18.5447C11.2686 21.6564 8.74561 24.1787 5.63398 24.1787C2.52235 24.1787 0 21.6564 0 18.5447C0 15.4331 2.52235 12.9102 5.63398 12.9102C8.74561 12.9102 11.2686 15.4331 11.2686 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 18.5447C23.7169 21.6564 21.194 24.1787 18.0823 24.1787C14.9707 24.1787 12.4478 21.6564 12.4478 18.5447C12.4478 15.4331 14.9707 12.9102 18.0823 12.9102C21.194 12.9102 23.7169 15.4331 23.7169 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 18.5447C36.165 21.6564 33.6427 24.1787 30.5311 24.1787C27.4188 24.1787 24.8965 21.6564 24.8965 18.5447C24.8965 15.4331 27.4188 12.9102 30.5311 12.9102C33.6427 12.9102 36.165 15.4331 36.165 18.5447Z"
                            fill="#0077BD"/>
                        <path
                            d="M23.7169 31.455C23.7169 34.5673 21.194 37.0896 18.0823 37.0896C14.9707 37.0896 12.4478 34.5673 12.4478 31.455C12.4478 28.3434 14.9707 25.821 18.0823 25.821C21.194 25.821 23.7169 28.3434 23.7169 31.455Z"
                            fill="#0077BD"/>
                        <path
                            d="M36.165 31.455C36.165 34.5673 33.6427 37.0896 30.5311 37.0896C27.4188 37.0896 24.8965 34.5673 24.8965 31.455C24.8965 28.3434 27.4188 25.821 30.5311 25.821C33.6427 25.821 36.165 28.3434 36.165 31.455Z"
                            fill="#373535"/>
                    </svg>
                    <div class="title-h2__content"><span>Почему</span> мы</div>
                </h2>
                <div class="why__body">
                    @foreach($advantages as $advantage)
                        <div animate class="why__item why-item">
                            <div class="why-item__digit">0{{ $loop->index + 1 }}</div>
                            <p class="why-item__text">
                                {{ $advantage->text }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
