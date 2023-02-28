@push('head')
    @livewireStyles
@endpush
<div>
    <main class="page">
        <section class="blog">
            <div class="blog__header">
                <picture>
                    <source srcset="{{ asset('img/blog/header.webp') }}" type="image/webp">
                    <img class="blog__background" src="{{ asset('img/blog/header.jpg') }}" alt="Фоновое изображение"/>
                </picture>
                <div class="blog__container">
                    <ul class="blog__breadcrumb breadcrumb breadcrumb--light">
                        <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">Блог</li>
                    </ul>
                    <h1 class="blog__title">Блог</h1>
                    <div class="blog__actions">
                        <form wire:submit.prevent class="blog__search search">
                            <div class="search__input">
                                <label>
                                    <input wire:model="search" autocomplete="off"
                                           type="text"
                                           placeholder="Поиск статей"/>
                                </label>
                            </div>
                            <button type="submit" wire:click="render" class="search__button">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.3875 12.3792L7.42083 8.4125C7.06667 8.69583 6.65937 8.92014 6.19896 9.08542C5.73854 9.25069 5.24861 9.33333 4.72917 9.33333C3.44236 9.33333 2.35342 8.88779 1.46233 7.99671C0.570778 7.10515 0.125 6.01597 0.125 4.72917C0.125 3.44236 0.570778 2.35318 1.46233 1.46163C2.35342 0.570542 3.44236 0.125 4.72917 0.125C6.01597 0.125 7.10515 0.570542 7.99671 1.46163C8.88779 2.35318 9.33333 3.44236 9.33333 4.72917C9.33333 5.24861 9.25069 5.73854 9.08542 6.19896C8.92014 6.65938 8.69583 7.06667 8.4125 7.42083L12.3969 11.4052C12.5267 11.5351 12.5917 11.6944 12.5917 11.8833C12.5917 12.0722 12.5208 12.2375 12.3792 12.3792C12.2493 12.509 12.084 12.574 11.8833 12.574C11.6826 12.574 11.5174 12.509 11.3875 12.3792ZM4.72917 7.91667C5.61458 7.91667 6.3673 7.60689 6.98733 6.98733C7.60689 6.36731 7.91667 5.61458 7.91667 4.72917C7.91667 3.84375 7.60689 3.09103 6.98733 2.471C6.3673 1.85144 5.61458 1.54167 4.72917 1.54167C3.84375 1.54167 3.09103 1.85144 2.471 2.471C1.85144 3.09103 1.54167 3.84375 1.54167 4.72917C1.54167 5.61458 1.85144 6.36731 2.471 6.98733C3.09103 7.60689 3.84375 7.91667 4.72917 7.91667Z"
                                        fill="white"/>
                                </svg>
                            </button>
                        </form>
                        <div class="blog__filter">
                            <button wire:click="setCategory(null)" type="button" class="blog__button">Все материалы
                            </button>
                            <button wire:click="setCategory(1)" type="button" class="blog__button">Новости</button>
                            <button wire:click="setCategory(2)" type="button" class="blog__button">Статьи</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog__container">
                <svg class="blog__decor" width="1750" height="1911" viewBox="0 0 1750 1911" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.03">
                        <path
                            d="M853.485 1695.21C853.485 1814.13 762.695 1910.51 650.72 1910.51C538.745 1910.51 447.954 1814.13 447.954 1695.21C447.954 1576.31 538.745 1479.91 650.72 1479.91C762.695 1479.91 853.485 1576.31 853.485 1695.21Z"
                            fill="#0077BD"/>
                        <path
                            d="M853.485 215.275C853.485 334.194 762.695 430.573 650.72 430.573C538.745 430.573 447.954 334.194 447.954 215.275C447.954 96.3792 538.745 0.000152922 650.72 0.000152922C762.695 0.000152922 853.485 96.3792 853.485 215.275Z"
                            fill="#373535"/>
                        <path
                            d="M1301.44 215.275C1301.44 334.194 1210.67 430.573 1098.69 430.573C986.695 430.573 895.926 334.194 895.926 215.275C895.926 96.3792 986.695 0.000152922 1098.69 0.000152922C1210.67 0.000152922 1301.44 96.3792 1301.44 215.275Z"
                            fill="#373535"/>
                        <path
                            d="M1749.4 215.275C1749.4 334.194 1658.63 430.573 1546.64 430.573C1434.66 430.573 1343.89 334.194 1343.89 215.275C1343.89 96.3792 1434.66 0.000152922 1546.64 0.000152922C1658.63 0.000152922 1749.4 96.3792 1749.4 215.275Z"
                            fill="#373535"/>
                        <path
                            d="M405.509 708.594C405.509 827.489 314.719 923.868 202.744 923.868C90.7689 923.868 0 827.489 0 708.594C0 589.698 90.7689 493.296 202.744 493.296C314.719 493.296 405.509 589.698 405.509 708.594Z"
                            fill="#0077BD"/>
                        <path
                            d="M853.485 708.594C853.485 827.489 762.695 923.868 650.72 923.868C538.745 923.868 447.954 827.489 447.954 708.594C447.954 589.698 538.745 493.296 650.72 493.296C762.695 493.296 853.485 589.698 853.485 708.594Z"
                            fill="#0077BD"/>
                        <path
                            d="M1301.44 708.594C1301.44 827.489 1210.67 923.868 1098.69 923.868C986.695 923.868 895.926 827.489 895.926 708.594C895.926 589.698 986.695 493.296 1098.69 493.296C1210.67 493.296 1301.44 589.698 1301.44 708.594Z"
                            fill="#0077BD"/>
                        <path
                            d="M853.485 1201.9C853.485 1320.82 762.695 1417.2 650.72 1417.2C538.745 1417.2 447.954 1320.82 447.954 1201.9C447.954 1083 538.745 986.624 650.72 986.624C762.695 986.624 853.485 1083 853.485 1201.9Z"
                            fill="#0077BD"/>
                        <path
                            d="M1301.44 1201.9C1301.44 1320.82 1210.67 1417.2 1098.69 1417.2C986.695 1417.2 895.926 1320.82 895.926 1201.9C895.926 1083 986.695 986.625 1098.69 986.625C1210.67 986.625 1301.44 1083 1301.44 1201.9Z"
                            fill="#373535"/>
                    </g>
                </svg>
                <div class="blog__body">
                    @foreach($articles as $article)
                        <article animate class="blog-latest__item blog-item">
                            <div class="blog-item__badge">{{ $article->category->name }}</div>
                            <div class="blog-item__image">
                                <picture>
                                    <source
                                        srcset="{{ $article->getFirstMedia('articles')->getUrl('articleThumbWebp') }} 1x, {{ $article->getFirstMedia('articles')->getUrl('articleThumbWebp@2') }} 2x"
                                        type="image/webp">
                                    <img
                                        src="{{ $article->getFirstMedia('articles')->getUrl('articleThumb') }}"
                                        srcset="{{ $article->getFirstMedia('articles')->getUrl('articleThumb@2') }} 1x, {{ $article->getFirstMedia('articles')->getUrl('articleThumb@2') }} 2x"
                                        alt="{{ $article->title }}"/></picture>
                            </div>
                            <div class="blog-item__content">
                                <div
                                    class="blog-item__date">{{ \Carbon\Carbon::parse($article->published_at)->format('d.m.Y') }}</div>
                                <h3 class="blog-item__title">
                                    {{ $article->title }}
                                </h3>
                                <a href="{{ route('blog.show', $article->slug) }}"
                                   class="blog-item__link link link--light">
                                    <span>Читать полностью</span>
                                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.53033 6.53033C6.82322 6.23744 6.82322 5.76256 6.53033 5.46967L1.75736 0.696699C1.46447 0.403806 0.989593 0.403806 0.696699 0.696699C0.403806 0.989593 0.403806 1.46447 0.696699 1.75736L4.93934 6L0.696699 10.2426C0.403806 10.5355 0.403806 11.0104 0.696699 11.3033C0.989593 11.5962 1.46447 11.5962 1.75736 11.3033L6.53033 6.53033ZM5 6.75H6V5.25H5V6.75Z"
                                            fill="#0077BD"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                {{ $articles->links() }}
            </div>
        </section>
    </main>
</div>
@push('script')
    @livewireScripts
    <script>
        Livewire.on('gotoTop', () => {
            window.scrollTo({
                top: 0,
                left: 0,
                behaviour: 'smooth'
            })
        })
    </script>
@endpush
