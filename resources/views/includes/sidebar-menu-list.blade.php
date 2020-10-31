<?php
/**
 * Created by PhpStorm.
 * User: TL
 * Date: 28.09.2020
 * Time: 20:03
 */
?>
<div class="list-group list-group-flush">
    @isset($items)
        @foreach( $items as $item )
            <a href="{{ $item['link'] }}" class="list-group-item {{ $item['is_active'] }}
                    list-group-item-action waves-effect">
                <i class="{{$item['icon']}} mr-3"></i>{{ $item['title'] }}
            </a>
        @endforeach
    @endisset
</div>
