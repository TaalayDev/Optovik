<?php
/**
 * Created by PhpStorm.
 * User=> TL
 * Date=> 25.09.2020
 * Time=> 16=>12
 */
?>

@php
    $title = 'Консоль / Оптовики';

    $navItems = [
            ["name"=>"Список", "link"=>route('console.wholesalers'), "is_active"=> "active"],
            ["name"=>"Добавить", "link"=>route('console.wholesalers.add'), "is_active"=> ""],
            ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
        ];

    $pages = [
            ['link'=>route('console.wholesalers'), 'name'=>'Оптовики']
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
    @livewire('wholesalers.table-w-filters', ['filters'=>true])
@endsection