@php use App\Http\Livewire\ConsoleNavbarLinks as cnl; @endphp
<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ cnl::checkActive('main') }}">
            <a class="nav-link waves-effect" href="{{ route('console.wholesalers') }}">Список
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item {{ cnl::checkActive('add') }}">
            <a class="nav-link waves-effect" href="{{ route('console.wholesalers.add') }}">Добавить
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item {{ cnl::checkActive('sett') }}">
            <a class="nav-link waves-effect" href="/settings">Настройки
                <span class="sr-only">(current)</span>
            </a>
        </li>
    </ul>


    <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/mdbootstrap/bootstrap-material-design"
               class="nav-link border border-light rounded waves-effect"
                target="_blank">
                <i class="fab fa-github mr-2"></i>MDB GitHub
            </a>
        </li>
    </ul>


</div>
