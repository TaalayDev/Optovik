<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 17:28
 */
?>

@extends('layouts.main', ['disableHeading' => true])

@section('title')
    @if(isset($title))
        {{$title}}
    @else
        Панель Управления
    @endif
@endsection

@section('navbar-links')
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        @if ( isset($navItems) )
            @include('includes.navbar-links-items', ['navItems'=>$navItems])
        @endif
        {{--@yield('navbar-links-menu')--}}

        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a href="" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('auth.logout') }}"
                   class="nav-link border border-light rounded waves-effect"
                   target="_blank">
                    <i class="fas fa-sign-out-alt mr-2"></i>Выйти
                </a>
            </li>
        </ul>

    </div>
@endsection