<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.10.2020
 * Time: 16:22
 */
?>

@php

    $navItems = [
        ["name" => "Список", "link" => route('cpanel.store.wholesalers'), "is_active" => ""],
        ["name" => "Добавить", "link" => route('cpanel.store.wholesalers.add'), "is_active" => "active"],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-stores-sidebar-menu', ['active' => 'whs'])

@section('content-page')
    @livewire('stores.other-wholesalers-table-w-filters', ['filters' => true])
@endsection
