<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 26.09.2020
 * Time: 16:25
 */
?>

@php
    $title = 'Консоль / Оптовики / Добавить';

    $navItems = [
            ["name"=>"Список", "link"=>route('console.wholesalers'), "is_active"=> ""],
            ["name"=>"Добавить", "link"=>route('console.wholesalers.add'), "is_active"=> "active"],
            ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
        ];

    $pages = [
            ['link'=>route('console.wholesalers'), 'name'=>'Оптовики'],
            ['link'=>route('console.wholesalers.add'), 'name'=>'Добавить'],
        ];
@endphp

@extends(
    'layouts.console-base',
    [
        'title'=>$title,
        'items'=>$navItems,
        'pages'=>$pages
    ]
)

@section('sidebar-menu')
    @livewire('console-sidebar-menu', ['active'=>'opto'])
@endsection

@section('content-page')
    @livewire('wholesalers.add')
@endsection
