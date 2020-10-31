<?php
/**
 * Created by PhpStorm.
 * User=> TL
 * Date=> 24.09.2020
 * Time=> 17=>42
 */
?>

@php
    $title = 'Консоль';    

    $navItems = [
            ["name"=>"Список", "link"=>route('console.wholesalers'), "is_active"=> "active"],
            ["name"=>"Добавить", "link"=>route('console.wholesalers.add'), "is_active"=> ""],
            ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
        ];

    $pages = [
            ['link'=>route('console'), 'name'=>'Статистика'],
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
    @livewire('console-sidebar-menu', ['active'=>'stat'])
@endsection

@section('content-page')
    @livewire('counter')
@endsection
