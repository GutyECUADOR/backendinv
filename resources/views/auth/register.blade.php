<x-app-layout>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">InversionesApp</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link px-3" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>
            </form>
            
          </div>
        </div>
    </header>
  
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
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
                    Registro nuevos clientes
                    </a>
                </li>
                </ul>

            </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Registro de nuevo Cliente</h1>
            </div>

            <div class="container">
                <div class="row justify-content-md-center">
                  <div class="col-md-6">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
        
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                        <!-- Name -->
                        <div class="form-floating mb-3">
                            <input type="name" name="name" value="{{old('name')}}" class="form-control" id="name" required autofocus>
                            <label for="name">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" required>
                            <label for="email">Correo Electrónico (email)</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="text" name="password" class="form-control" id="password" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" required>
                            <label for="password_confirmation">Confirme Contraseña</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn-block btn btn-lg btn-primary" type="submit">Registrar</button>
                        </div>
        
                    </form>
                  </div>
                </div>
            </div>

            </main>
        </div>
    </div>
       
    
</x-app-layout>
