<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 17:08
 */
?>

@extends('layouts.base')

{{-- Navbar --}}
@section('navbar')
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <button class="navbar-toggler" id="sidebarCollapse" type="button">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="/" target="_blank">
                <strong class="blue-text">Optovik</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-ellipsis-v"></i>
            </button>

            @yield('navbar-links')

        </div>
    </nav>
@endsection
{{-- .Navbar --}}

{{-- Sidebar --}}
@section('sidebar')
    <div class="sidebar-fixed position-fixed" id="sidebar">

        <a class="sidebar-close waves-effect">
            <i class="fas fa-times"></i>
        </a>

        <a class="logo-wrapper waves-effect">
            <img src="/images/im231x80.png" class="img-fluid" alt="">
        </a>

        @yield('sidebar-menu')

    </div>
@endsection
{{-- Sidebar --}}

{{-- Content Body --}}
@section('content-body')
    @if(empty($disableHeading))
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="@if(isset($mainLink)) {{$mainLink}} @else {{ route('console') }} @endif" target="_blank">
                        Главная</a>
                    @yield('pages')
                </h4>

                @yield('search-form')

            </div>

        </div>
        <!-- Heading -->
    @endif

    @yield('content-page')

@endsection
{{-- .Content Body --}}
