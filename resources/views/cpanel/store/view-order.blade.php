<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.10.2020
 * Time: 18:03
 */
?>

@php

    $navItems = [
        ["name" =>"Сведения", "link" => route('cpanel.store.orders.view', $id), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-store-sidebar-menu', ['active' => 'ord'])

@section('content-page')
    @livewire('wholesalers.view-order', ['orderId' => $id])
@endsection

