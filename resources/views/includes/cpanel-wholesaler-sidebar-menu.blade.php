<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 20:48
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
            'title'     => 'Магазины',
            'link'      => route('cpanel.wholesaler.stores'),
            'is_active' => isset($active) && $active == 'store' ? 'active' : '',
            'icon'      => 'fas fa-store',
        ],
        [
            'title'     => 'Продукты',
            'link'      => route('cpanel.wholesaler.products'),
            'is_active' => isset($active) && $active == 'prod' ? 'active' : '',
            'icon'      => 'fas fa-boxes',
        ],
        [
            'title'     => 'Заказы',
            'link'      => route('cpanel.wholesaler.orders'),
            'is_active' => isset($active) && $active == 'ord' ? 'active' : '',
            'icon'      => 'fas fa-book',
        ],
        [
            'title'     => 'Настройки',
            'link'      => route('cpanel.wholesaler.settings'),
            'is_active' => isset($active) && $active == 'sett' ? 'active' : '',
            'icon'      => 'fas fa-user-cog',
        ],
    ];

@endphp

@section('sidebar-menu')
    @include('includes.sidebar-menu-list', ['items' => $sidebarMenuList])
@endsection