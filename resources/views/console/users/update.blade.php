<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 0:58
 */
?>

@php
    $title = 'Консоль / Пользователи / Изменить';

    $navItems = [
                ["name"=>"Список", "link"=>route('console.users'), "is_active"=> ""],
                ["name"=>"Добавить", "link"=>route('console.users.add'), "is_active"=> ""],
                ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
            ];

    $pages = [
            ['link'=>route('console.users'), 'name'=>'Пользователи'],
            [
                'link'=>route('console.users.update', $id),
                'name'=>App\Http\Controllers\UserController::getName($id)
            ],
            ['link'=>route('console.users.update', $id), 'name'=>'Изменить']
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
    @livewire('users.update', ['uid'=>$id])
@endsection
