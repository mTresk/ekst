<x-mail::message>
    # Получен отзыв с сайта ekst.ru!

    Имя/Компания: {{ $message['name'] }}

    Телефон: {{ $message['phone'] }}

    Сообщение: {{ $message['text'] }}

    Не забудьте опубликовать его в админ-панели.
</x-mail::message>
