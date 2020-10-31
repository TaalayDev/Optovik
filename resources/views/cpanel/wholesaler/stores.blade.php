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
        ["name"=>"Мои", "link"=>route('cpanel.wholesaler.stores'), "is_active"=> "active"],
        [
            "name"      => "Добавить",
            "link"      => route('cpanel.wholesaler.stores.add'),
            "is_active" => "",
            "count-badge"     => count(\App\Http\Controllers\Store\StoreController::filterWS(auth()->user()->base_name)),
        ],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'store'])

@section('content-page')
    @livewire('wholesalers.stores-table-w-filters', ['filters' => true])
@endsection
