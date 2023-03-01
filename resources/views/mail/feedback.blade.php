<x-mail::message>
    # Сообщение с сайта ekst.ru!

    Имя: {{ $message['name'] }}

    Телефон: {{ $message['phone'] }}

    Email: {{ $message['email'] }}
    
    Сообщение: {{ $message['message'] }}
</x-mail::message>
