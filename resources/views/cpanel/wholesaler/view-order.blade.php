<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 29.09.2020
 * Time: 18:03
 */
?>

@php

    $navItems = [
        ["name" =>"Сведения", "link" => route('cpanel.wholesaler.orders.view', $id), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'ord'])

@section('content-page')
    @livewire('wholesalers.view-order', ['orderId' => $id])
@endsection

