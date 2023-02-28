@extends('layout.contacts')

@section('title', 'Контакты')
@section('description', 'Контакты Института электрокаплеструйных технологий')

@section('content')
    <main class="page">
        <section class="contacts-header">
            <picture>
                <source srcset="{{ asset('img/contacts-header.webp') }}" type="image/webp">
                <img src="{{ asset('img/contacts-header.jpg') }}" alt="Фоновое изображение"
                     class="contacts-header__background"/>
            </picture>
            <div class="contacts-header__container">
                <ul class="contacts-header__breadcrumb breadcrumb breadcrumb--light">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Контакты</li>
                </ul>
                <h1 class="contacts-header__title">Наши контакты</h1>
            </div>
        </section>
        <section animate class="contacts">
            <div class="contacts__container">
                <div class="contacts__body">
                    <div class="contacts__content">
                        @foreach($contacts as $contact)
                            <div animate class="contacts__block">
                                <h3 class="contacts__subtitle">{{ $contact['name'] }}</h3>
                                @isset($contact['address'])
                                    <div class="contacts__item">
                                        <div class="contacts__label">Офис №1</div>
                                        <div class="contacts__info">
                                            {{ $contact['address'] }}
                                        </div>
                                    </div>
                                @endisset
                                @isset($contact['phone'])
                                    <div class="contacts__item">
                                        <div class="contacts__label">Телефон</div>
                                        <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $contact['phone'] ) }}"
                                           class="contacts__info">{{ $contact['phone'] }}</a>
                                    </div>
                                @endisset
                                @isset($contact['email'])
                                    <div class="contacts__item">
                                        <div class="contacts__label">Email</div>
                                        <a href="mailto:{{ $contact['email'] }}"
                                           class="contacts__info">{{ $contact['email'] }}</a>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                    <form animate action="#" class="contacts__form form">
                        <h3 class="form__title">Напишите нам</h3>
                        <div class="form__input">
                            <input autocomplete="off" type="text" name="name" placeholder="Ваше имя*"/>
                        </div>
                        <div class="form__input">
                            <input autocomplete="off" type="text" name="phone" placeholder="Номер телефона*"/>
                        </div>
                        <div class="form__input">
                            <input autocomplete="off" type="text" name="email" placeholder="Email"/>
                        </div>
                        <div class="form__input">
                            <input autocomplete="off" type="text" name="message" placeholder="Сообщение*"/>
                        </div>
                        <div class="form__footer">
                            <button type="submit" class="form__button button">Отправить</button>
                            <div class="form__policy">
                                Нажимая на кнопку вы соглашаетесь на обработку
                                <a href="/policy.html">персональных данных</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section animate class="map">
            <div class="map__container">
                <h2 class="map__title title-h2">
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
                    <div class="title-h2__content"><span>Дилерская</span> <br/>сеть</div>
                </h2>
            </div>
            <div class="map__map" id="map" data-coordinates="59.90441406420934,30.279890499999986">
                @foreach($dealers as $dealer)
                    <div data-coordinates="{{ $dealer->coordinates }}" class="map__unit">
                        <h3><strong>{{ $dealer->name }}</strong></h3>
                        <p>{{ $dealer->address }}</p>
                        <p>Телефон: <a class="map__link"
                                       href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $dealer->phone ) }}">{{ $dealer->phone }}</a>
                        </p>
                        <p>E-mail: <a class="map__link" href="mailto:{{ $dealer->email }}">{{ $dealer->email }}</a></p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=e7bd9cbd-491b-4108-88db-3f644a19a4f2&_v=20230216092649"
        type="text/javascript"></script>
@endpush
