<x-app-layout>
    <x-navbar-menu></x-navbar-menu>
  
    <div class="container-fluid">
        <div class="row">
            <x-sidebar-menu></x-sidebar-menu>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Editar inversion: {{ $inversion->id}}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    
                            <a href="{{ route('dashboard')}}" class="btn btn-sm btn-outline-primary">
                                <span data-feather="corner-down-left"></span>
                                    Regresar a la lista
                            </a>
                          
                      
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                    <form method="POST" action="{{ route('inversions.update', $inversion) }}">
                        @csrf
                        @method('PUT')
                        
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
        
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                        <!-- Estado -->
                        <div class="form mb-3">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control form-control-sm">
                                <option value="cancelada" {{ $inversion->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                <option value="pendiente" {{ $inversion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="aprobada" {{ $inversion->estado == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                                <option value="pagada" {{ $inversion->estado == 'pagada' ? 'selected' : '' }}>Pagada</option>
                            </select>
                        </div>

                        <!-- Estado -->
                        <div class="form-floating mb-3">
                            <input type="text" name="observacion" value="{{ $inversion->observacion }}" class="form-control" id="nombre" required autofocus>
                            <label for="observacion">Observacion</label>
                        </div>
    
                      
                        <div class="d-grid gap-2">
                            <button class="btn-block btn btn-lg btn-primary" type="submit">Actualizar</button>
                        </div>
        
                    </form>
                        </div>
                    </div>
                </div>
                

            </main>

          
        </div>
    </div>
       
    
</x-app-layout>
