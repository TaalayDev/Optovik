<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 29.09.2020
 * Time: 13:29
 */
?>

@php

    $navItems = [
        ["name" => "Список", "link" => route('cpanel.wholesaler.products'), "is_active" => ""],
        ["name" => "Добавить", "link" => route('cpanel.wholesaler.products.add'), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'prod'])

@section('content-page')
    @livewire('wholesalers.add-products')
@endsection
