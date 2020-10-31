<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 29.09.2020
 * Time: 12:39
 */
?>

@php

    $navItems = [
        ["name" => "Мои", "link" => route('cpanel.wholesaler.stores'), "is_active" => ""],
        ["name" => "Добавить", "link" => route('cpanel.wholesaler.stores.add'), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'store'])

@section('content-page')
    @livewire('wholesalers.other-stores-table-w-filters', ['filters' => true])
@endsection
