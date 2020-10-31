<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 27.09.2020
 * Time: 1:31
 */
?>

@php
    $title = 'Консоль / Магазины / Изменить';

    $navItems = [
                ["name"=>"Список", "link"=>route('console.stores'), "is_active"=> ""],
                ["name"=>"Добавить", "link"=>route('console.stores.add'), "is_active"=> ""],
                ["name"=>"Настройки", "link"=>"", "is_active"=> ""]
            ];

    $pages = [
            ['link'=>route('console.stores'), 'name'=>'Магазины'],
            [
                'link'=>route('console.stores.update', $id),
                'name'=>App\Http\Controllers\Store\StoreController::getName($id)
            ],
            ['link'=>route('console.stores.update', $id), 'name'=>'Изменить']
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
    @livewire('stores.update', ['sid'=>$id])
@endsection

