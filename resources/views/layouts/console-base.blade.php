<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 26.09.2020
 * Time: 19:15
 */
?>

@extends('layouts.main')

@isset($title)
    @section('title') {{$title}} @endsection
@endisset

@section('navbar-links')
<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left -->
    @if ( isset($navItems) )
        @include('includes.navbar-links-items', ['navItems'=>$navItems])
    @endif
    {{--@yield('navbar-links-menu')--}}

    <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design"
               class="nav-link border border-light rounded waves-effect"
               target="_blank">
                <i class="fas fa-sign-out-alt mr-2"></i>Выйти
            </a>
        </li>
    </ul>

</div>
@endsection

@isset($pages)
    @section('pages')
        @foreach( $pages as $page )
            <span>/</span> <a href="{{ $page['link'] }}" target="_blank">{{ $page['name'] }}</a>
        @endforeach
    @endsection
@endisset
