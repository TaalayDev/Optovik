<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 23.09.2020
 * Time: 16:23
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <title>Wholesalers</title>

    <style>
        /* Set a background image by replacing the URL below */
        body {
            background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Wholesalers add</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <div class="row">
                @if ( $errors->any() )
                    <div class="alert alert-danger">
                        <ol>
                            @foreach( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                <div class="col-12">
                    <form action="{{ route('wholesalers.add.products.request', $id) }}" method="post">
                        {{ csrf_field() }}
                        <input name="name" placeholder="name"> <br><br>
                        <input name="price" type="number" placeholder="price"> <br><br>
                        <input name="quantity" type="number" placeholder="quantity"> <br><br>
                        <select name="unit">
                            <option value="kl">кл</option>
                            <option value="sht">шт</option>
                            <option value="lt">лт</option>
                        </select>
                        <br><br>
                        <input name="description" placeholder="description"> <br><br>
                        <button>send</button>
                    </form>
                </div>
            </div>
            <div style="height: 700px"></div>
        </div>
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>
</html>
