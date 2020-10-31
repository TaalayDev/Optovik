<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 26.09.2020
 * Time: 23:39
 */
?>

@php
    $title = 'Консоль / Магазины / Добавить';

    $navItems = [
                ["name"=>"Список", "link"=>route('console.stores'), "is_active"=> ""],
                ["name"=>"Добавить", "link"=>route('console.stores.add'), "is_active"=> "active"],
                ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
             ];

    $pages = [
            ['link'=>route('console.stores'), 'name'=>'Магазины'],
            ['link'=>route('console.stores.add'), 'name'=>'Добавить'],
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
    @livewire('console-sidebar-menu', ['active'=>'stor'])
@endsection

@section('content-page')
    @livewire('stores.add')
@endsection
