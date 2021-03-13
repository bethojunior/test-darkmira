
<nav class="navbar fixed-top navbar-expand-md flex-nowrap navbar-new-top">
    <a href="/" class="navbar-brand">
        <img src="{{ asset('assets/images/logo/icon.png') }}" alt=""/>
    </a>
    <ul class="nav navbar-nav mr-auto"></ul>
    <ul class="navbar-nav flex-row">
        <li class="nav-item">
            <a href="" class="nav-link px-2"></a>
        </li>
        <li class="nav-item">
            <a href="/login" class="nav-link px-2">Admin</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('memories.memories') }}" class="nav-link px-2">Criar memoria</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('memories.list') }}" class="nav-link px-2">Listar memorias</a>
        </li>
    </ul>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
