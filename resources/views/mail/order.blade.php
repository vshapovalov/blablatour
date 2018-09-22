<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<p>Оформлена заявка на тур/экскурсию</p>
<br>
<p>Е-mail <b>{{ $order->email }}</b> </p>
<p>ФИО <b>{{ $order->name }}</b> </p>
<p>Телефон <b>{{ $order->phone }}</b> </p>
<p>Название тура/экскурсии <b>{{ $order->target_name }}</b> </p>
<p>Дата экскурсии <b>{{ $order->target_date }}</b> </p>
</body>
</html>