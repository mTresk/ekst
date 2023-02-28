@extends('layout.app')

@section('color', 'light')
@section('title', $article->title)

@section('content')
    <main class="page">
        <section class="post">
            <div class="post__container">
                <ul class="post__breadcrumb breadcrumb">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('blog.index') }}">Блог</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">
                        {{ $article->title }}
                    </li>
                </ul>
                <h1 class="post__title title-h2 title-h2--post">
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
                    <div class="title-h2__content">
                        {{ $article->title }}
                    </div>
                </h1>
                <div class="post__info">
                    <span>{{ \Carbon\Carbon::parse($article->published_at)->format('d.m.Y') }}</span> |
                    <span>{{ $article->category->name }}</span></div>
                <div class="post__body">
                    <div class="post__wrapper">
                        <div class="post__image">
                            <picture>
                                <source
                                    srcset="{{ $article->getFirstMedia('articles')->getUrl('articleWebp') }} 1x, {{ $article->getFirstMedia('articles')->getUrl('articleWebp@2') }} 2x"
                                    type="image/webp">
                                <img
                                    src="{{ $article->getFirstMedia('articles')->getUrl('article') }}"
                                    srcset="{{ $article->getFirstMedia('articles')->getUrl('article@2') }} 1x, {{ $article->getFirstMedia('articles')->getUrl('article@2') }} 2x"
                                    alt="{{ $article->title }}"/></picture>
                        </div>
                        <div class="post__content content">
                            {!! $article->content !!}
                        </div>
                        <div class="post__links">
                            @isset($previous->slug)
                                <a href="{{ route('blog.show', ['slug' => $previous->slug]) }}"
                                   class="post__link link link--light post__link--previous">
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.469792 5.46977C0.176899 5.76266 0.176899 6.23753 0.469792 6.53043L5.24276 11.3034C5.53566 11.5963 6.01053 11.5963 6.30342 11.3034C6.59632 11.0105 6.59632 10.5356 6.30342 10.2427L2.06078 6.0001L6.30342 1.75746C6.59632 1.46456 6.59632 0.989689 6.30342 0.696795C6.01053 0.403902 5.53566 0.403902 5.24276 0.696795L0.469792 5.46977ZM2.00012 5.2501H1.00012V6.7501H2.00012V5.2501Z"
                                            fill="#373535" fill-opacity="0.5"/>
                                    </svg>
                                    <span>Предыдущая статья</span>
                                </a>
                            @endisset
                            @isset($next->slug)
                                <a href="{{ route('blog.show', ['slug' => $next->slug]) }}"
                                   class="post__link link link--light post__link--next">
                                    <span>Следующая статья</span>
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.53033 6.53033C6.82322 6.23744 6.82322 5.76256 6.53033 5.46967L1.75736 0.696699C1.46447 0.403806 0.989593 0.403806 0.696699 0.696699C0.403806 0.989593 0.403806 1.46447 0.696699 1.75736L4.93934 6L0.696699 10.2426C0.403806 10.5355 0.403806 11.0104 0.696699 11.3033C0.989593 11.5962 1.46447 11.5962 1.75736 11.3033L6.53033 6.53033ZM5 6.75H6V5.25H5V6.75Z"
                                            fill="#373535" fill-opacity="0.5"/>
                                    </svg>
                                </a>
                            @endisset
                        </div>
                    </div>
                    <aside data-sticky data-sticky-top="90" class="post__materials post-materials">
                        <div data-sticky-item class="post-materials__wrapper">
                            <h2 class="post-materials__title">Другие материалы</h2>
                            <div class="post-materials__body">
                                @foreach($otherArticles as $otherArticle)
                                    <a href="{{ route('blog.show', $otherArticle->slug) }}"
                                       class="post-materials__item">
                                        <div class="post-materials__image">
                                            <picture>
                                                <source
                                                    srcset="{{ $otherArticle->getFirstMedia('articles')->getUrl('articleThumbWebp') }} 1x, {{ $otherArticle->getFirstMedia('articles')->getUrl('articleThumbWebp@2') }} 2x"
                                                    type="image/webp">
                                                <img
                                                    src="{{ $otherArticle->getFirstMedia('articles')->getUrl('articleThumb') }}"
                                                    srcset="{{ $otherArticle->getFirstMedia('articles')->getUrl('articleThumb@2') }} 1x, {{ $otherArticle->getFirstMedia('articles')->getUrl('articleThumb@2') }} 2x"
                                                    alt="{{ $otherArticle->title }}"/></picture>
                                        </div>
                                        <p class="post-materials__text">
                                            {{ $otherArticle->title }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@endsection
