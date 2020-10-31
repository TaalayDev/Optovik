<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 0:57
 */
?>

@php
    $title = 'Консоль / Пользователи / Добавить';

    $navItems = [
                ["name"=>"Список", "link"=>route('console.users'), "is_active"=> ""],
                ["name"=>"Добавить", "link"=>route('console.users.add'), "is_active"=> "active"],
                ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
            ];

    $pages = [
            ['link'=>route('console.users'), 'name'=>'Пользователи'],
            ['link'=>route('console.users.add'), 'name'=>'Добавить'],
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
    @livewire('console-sidebar-menu', ['active'=>'user'])
@endsection

@section('content-page')
    @livewire('users.add')
@endsection
