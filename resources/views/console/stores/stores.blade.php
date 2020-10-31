<?php
/**
 * Created by PhpStorm.
 * User=> TL
 * Date=> 25.09.2020
 * Time=> 16=>12
 */
?>

@php
    $title = 'Консоль / Магазины';

    $navItems = [
                ["name"=>"Список", "link"=>route('console.stores'), "is_active"=> "active"],
                ["name"=>"Добавить", "link"=>route('console.stores.add'), "is_active"=> ""],
                ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
            ];

    $pages = [
            ['link'=>route('console.stores'), 'name'=>'Магазины'],
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
    @livewire('stores.table-w-filters', ['filters'=>true])
@endsection
