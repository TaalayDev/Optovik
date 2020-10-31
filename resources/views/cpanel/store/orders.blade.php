<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.10.2020
 * Time: 16:23
 */
?>

@php

    $navItems = [
        ["name" =>"Список", "link" => route('cpanel.store.orders'), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-stores-sidebar-menu', ['active' => 'ord'])

@section('content-page')
    @livewire('wholesalers.orders-table-w-filters', ['filters' => false])
@endsection
