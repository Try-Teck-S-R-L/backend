<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LIGA MAXIBASQUET</h1>
    @if(@Auth::user()>hasRole('user'))
    <h2>eres un usuario no autenticado</h2>
    @endif
</body>
</html>