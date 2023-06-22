<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script> --}}
    <style>
    .carrinho-img {
        width: 150px;
    }
    
    .card-produtos {
        height: 400px;
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .card-hover {
    transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-wide {
    width: 100%; /* Ajuste o valor conforme necessário */
    margin: 0 auto; /* Centralizar os cards horizontalmente */
}

    </style>
    <title>ByteStore</title>
</head>
<body>
    @include("partials.menu")

    @yield("main")
    
</body>
</html>