<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
            <span data-feather="home"></span>
            Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('tipos-inversion.index')}}">
            <span data-feather="bar-chart-2"></span>
            Tipos de Inversion
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dias-inversion.index')}}">
            <span data-feather="layers"></span>
            Dias de inversion
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">
            <span data-feather="users"></span>
                Clientes
            </a>
        </li>
        </ul>

    </div>
</nav>