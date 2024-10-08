<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{ $css }}
</head>
<body>
    <div class="container-fluid mb-5">
        <div class="row">
            <a href="/"><img class="d-flex w-25 mx-auto" src="{{ asset('img/logo3.png') }}" alt="logo" srcset=""></a>
        </div>
    </div>

    {{ $main }}

    {{ $javaScript }}
</body>
</html>