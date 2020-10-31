<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 20:31
 */
?>

@php

    $navItems = [
        ["name" =>"Новые", "link" => route('cpanel.wholesaler.orders'), "is_active" => "active"],
        ["name" =>"Выполненные", "link" => route('cpanel.wholesaler.orders.completed'), "is_active" => ""],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'ord'])

@section('content-page')
    @livewire('wholesalers.orders-table-w-filters', ['filters' => false])
@endsection
