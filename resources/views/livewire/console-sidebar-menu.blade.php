<?php use \App\Http\Livewire\ConsoleSidebarMenu as csm; ?>
<div class="list-group list-group-flush">
    <a href="{{ route('console') }}" class="list-group-item {{ csm::checkActive('stat') }}
            list-group-item-action waves-effect">
        <i class="fas fa-chart-line mr-3"></i>Статистика
    </a>
    <a href="{{ route('console.users') }}" class="list-group-item {{ csm::checkActive('user') }}
            list-group-item-action waves-effect">
        <i class="fas fa-user mr-3"></i>Пользователи
    </a>
    <a href="{{ route('console.wholesalers') }}" class="list-group-item {{ csm::checkActive('opto') }}
            list-group-item-action waves-effect">
        <i class="fas fa-warehouse mr-3"></i>Оптовики
    </a>
    <a href="{{ route('console.stores') }}" class="list-group-item {{ csm::checkActive('stor') }}
            list-group-item-action waves-effect">
        <i class="fas fa-store mr-3"></i>Магазины
    </a>
</div>