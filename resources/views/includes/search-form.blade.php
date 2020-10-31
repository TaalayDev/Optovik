<form id="search_form" wire:submit.prevent="search" wire:model.debounce.500ms="searchText" class="d-flex justify-content-center">
    <!-- Default input -->
    <input type="search" placeholder="Поиск" aria-label="Search" class="form-control">
    <button class="btn btn-primary btn-sm my-0 p" type="submit">
        <i class="fas fa-search"></i>
    </button>
</form>