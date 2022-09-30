<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
            <span data-feather="home"></span>
            Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Tipos de Inversion
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
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
        <li class="nav-item">
            <a class="nav-link" href="{{route('password.request')}}">
            <span data-feather="key"></span>
            Restaurar contraseñas
            </a>
        </li>
        </ul>

    </div>
</nav>