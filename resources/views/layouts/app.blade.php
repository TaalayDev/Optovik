<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 15:34
 */
?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/mdb.min.css" />

    <link rel="stylesheet" href="/css/style.min.css">
    <link rel="stylesheet" href="/css/app.css">

    @stack('styles')

</head>
<body>

@yield('navigation')

@yield('content')

@yield('footer')

<script href="/js/jquery-3.4.1.min.js"></script>
<script href="/js/bootstrap.min.js"></script>
<script href="/js/mdb.min.js"></script>
@stack('scripts')

</body>
</html>