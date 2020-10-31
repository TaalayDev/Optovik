<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 29.09.2020
 * Time: 17:51
 */
?>

@php

    $navItems = [
        ["name" =>"Новые", "link" => route('cpanel.wholesaler.orders'), "is_active" => ""],
        ["name" =>"Выполненные", "link" => route('cpanel.wholesaler.orders.completed'), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'ord'])

@section('content-page')
    @livewire('wholesalers.completed-orders-table-w-filters', ['filters' => false])
@endsection
