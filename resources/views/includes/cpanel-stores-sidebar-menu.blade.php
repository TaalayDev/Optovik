<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.10.2020
 * Time: 16:01
 */
?>

@php

    $sidebarMenuList = [
        [
            'title'     => 'Статистика',
            'link'      => route('cpanel.home'),
            'is_active' => isset($active) && $active == 'stat' ? 'active' : '',
            'icon'      => 'fas fa-chart-line',
        ],
        [
            'title'     => 'Оптовики',
            'link'      => route('cpanel.store.wholesalers'),
            'is_active' => isset($active) && $active == 'whs' ? 'active' : '',
            'icon'      => 'fas fa-store',
        ],
        [
            'title'     => 'Продукты',
            'link'      => route('cpanel.store.products'),
            'is_active' => isset($active) && $active == 'prod' ? 'active' : '',
            'icon'      => 'fas fa-boxes',
        ],
        [
            'title'     => 'Заказы',
            'link'      => route('cpanel.store.orders'),
            'is_active' => isset($active) && $active == 'ord' ? 'active' : '',
            'icon'      => 'fas fa-book',
        ],
        [
            'title'     => 'Настройки',
            'link'      => route('cpanel.store.settings'),
            'is_active' => isset($active) && $active == 'sett' ? 'active' : '',
            'icon'      => 'fas fa-user-cog',
        ],
    ];

@endphp

@section('sidebar-menu')
    @include('includes.sidebar-menu-list', ['items' => $sidebarMenuList])
@endsection
