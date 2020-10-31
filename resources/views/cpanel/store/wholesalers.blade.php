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
        ["name"=>"Мои", "link"=>route('cpanel.store.wholesalers'), "is_active"=> "active"],
        [
            "name"      => "Добавить",
            "link"      => route('cpanel.store.wholesalers.add'),
            "is_active" => "",
            "count-badge"     => count(\App\Http\Controllers\Wholesaler\WholesalerController::filterSW(auth()->user()->base_name)),
        ],
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-stores-sidebar-menu', ['active' => 'whs'])

@section('content-page')
    @livewire('stores.wholesalers-table-w-filters', ['filters' => true])
@endsection

