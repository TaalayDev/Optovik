<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 20:30
 */
?>

@php

    $navItems = [
        ["name" =>"Список", "link" => route('cpanel.wholesaler.products'), "is_active" => "active"],
        ["name" => "Добавить", "link" => route('cpanel.wholesaler.products.add'), "is_active" => ""],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'prod'])

@section('content-page')
    @livewire('wholesalers.products-table-w-filters', ['filters' => false])
@endsection
