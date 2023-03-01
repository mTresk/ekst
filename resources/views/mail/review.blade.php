<x-mail::message>
    # Получен отзыв с сайта ekst.ru!

    Имя: {{ $message['name'] }}

    Телефон: {{ $message['phone'] }}

    Сообщение: {{ $message['text'] }}
</x-mail::message>
