<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 26.09.2020
 * Time: 22:05
 */
?>
<ul class="navbar-nav mr-auto">
    @if ( isset($navItems) )
        @foreach( $navItems as $item )
            <li class="nav-item {{ $item['is_active'] }}">
                <a class="nav-link waves-effect" href="{{ $item['link'] }}">{{$item['name']}}
                    @isset($item['count-badge'])
                    <span class='badge badge-danger ml-2'>{{$item['count-badge']}}</span>
                    @endisset
                </a>
            </li>
        @endforeach
    @endif
</ul>