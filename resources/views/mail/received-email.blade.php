<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Mensaje</title>
</head>
<body>
    <h1>Has recibido un nuevo Mensaje</h1>
    <p><strong>Email:</strong> {{$email}}</p>
    <p><strong>Asunto:</strong> {{$subject}}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{$body}}</p>
</body>
</html>
