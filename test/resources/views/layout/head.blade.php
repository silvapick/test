<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0,
        maximum-scale=1.0, user-scalable=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" media="all"
        href="{{ asset('css/app.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" media="all"
        href="{{ asset('css/bootstrap.css') }}">

    @yield('css')

</head>
