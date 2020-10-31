<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 17:00
 */
?>

@extends('layouts.app')

{{-- Main Navigation --}}
@section('navigation')
    <header>
        @yield('navbar')
        @yield('sidebar')
    </header>
@endsection
{{-- .Main Navigation --}}

{{-- Main Layout --}}
@section('content')
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5 wrapper">
            @yield('content-body')
        </div>
    </main>
@endsection
{{-- .Main Layout --}}

{{-- Main Footer --}}
@section('footer')
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        <div class="pt-4">

        </div>
        <!--/.Call to action-->

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">

        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            <a href="http://one-t.kg" target="_blank"> Powered by : One-T </a>
        </div>
        <!--/.Copyright-->

    </footer>
@endsection
{{-- Main Footer --}}