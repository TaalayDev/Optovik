<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 17:05
 */
?>

@php

    $navItems = [
        ["name"=>"Список", "link"=>route('console.wholesalers'), "is_active"=> "active"],
        ["name"=>"Добавить", "link"=>route('console.wholesalers.add'), "is_active"=> ""],
        ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
    ];

@endphp

@extends('layouts.cpanel-base', ['items' => $navItems])

@include('includes.cpanel-wholesaler-sidebar-menu', ['active' => 'stat'])

@section('content-page')
    @livewire('counter')
@endsection
