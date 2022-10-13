<x-app-layout>
    <x-navbar-menu></x-navbar-menu>
    
    <div class="container-fluid">
      <div class="row">
        <x-sidebar-menu></x-sidebar-menu>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ultimas Inversiones</h1>
            {{-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> --}}
          </div>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tasa</th>
                  <th scope="col">Dias</th>
                  <th scope="col">Monto</th>
                  <th scope="col">A Recibir</th>
                  <th scope="col">Fecha Inversion</th>
                  <th scope="col">Fecha Pago</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Recibo</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($inversiones as $inversion)
                  <tr>
                    <td>{{ $inversion->id }}</td>
                    <td>{{ $inversion->tasa }}</td>
                    <td>{{ $inversion->dias_inversion }}</td>
                    <td>{{ $inversion->monto }}</td>
                    <td>{{ $inversion->monto_recibir }}</td>
                    <td>{{ $inversion->fecha_inversion }}</td>
                    <td>{{ $inversion->fecha_pago }}</td>
                    <td>{{ $inversion->estado }}</td>
                    <td><a class="btn btn-success btn-sm" href="{{ asset('/storage/recibos/'.$inversion->imagen_recibo) }}" download target="_blank">
                      <span data-feather="download"></span> Descargar</a>
                    </td>
                    <td>
                      <a href="{{ route('inversions.edit', $inversion)}}" class="btn btn-sm btn-primary">
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
      </div>
    </div>
</x-app-layout>
