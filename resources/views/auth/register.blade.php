<x-app-layout>
    <x-navbar-menu></x-navbar-menu>
  
    <div class="container-fluid">
        <div class="row">
            <x-sidebar-menu></x-sidebar-menu>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Lista de Clientes</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <span data-feather="user"></span>
                            Crear nuevo cliente
                        </button>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <div class="table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ranking</th>
                            <th scope="col">ROL</th>
                            <th scope="col">Fecha de Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->ranking }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('register.edit', $user)}}" class="btn btn-sm btn-primary">
                                            <span data-feather="edit"></span>
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>

            </main>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
            
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
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
       
    
</x-app-layout>
