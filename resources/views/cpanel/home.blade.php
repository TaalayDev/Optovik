<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 24.09.2020
 * Time: 17:42
 */
?>

@if ( auth()->check() )

    @if ( auth()->user()->role == 'wholesaler' )
        @include('cpanel.wholesaler.home')
    @elseif( auth()->user()->role == 'store' )
        @include('cpanel.store.home')
    @else
        Other
    @endif

@endif
