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
<p>Поступило сообщение обратной связи</p>
<br>
<p>Е-mail <b>{{ $messageObject->email }}</b> </p>
<p>ФИО <b>{{ $messageObject->name }}</b> </p>
<p>Телефон <b>{{ $messageObject->phone }}</b> </p>
<p>Тема сообщения <b>{{ $messageObject->subject }}</b> </p>
<p>Сообщение <b>{{ $messageObject->message }}</b> </p>
</body>
</html>