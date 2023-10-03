@extends('layouts.main', ['activePage' => 'clients', 'titlePage' => 'Clientes'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Clientes</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 text-right">
                        {{-- @can('clients.create') --}}
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-facebook">Añadir Cliente</a>
                        {{-- @endcan --}}
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Cajero</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Prenda</th>
                            <th>Monto</th>
                            <th>Entregar Prenda</th>
                            <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($clients as $index => $client)
                          <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>
                                @if($client->description)
                                    <span class="bg-primary text-white rounded p-2 font-weight-bold">{{$client->description}}</span>
                                @else
                                    <span class="bg-danger text-white rounded p-2 font-weight-bold">No dejo prenda</span>
                                @endif
                            </td>
                            <td>
                                @if ($client->amount)
                                    <b class="font-weight-bold">{{ $client->amount }} Bs.</b>
                                @else
                                    <span class="bg-danger text-white rounded p-2 font-weight-bold">No hay monto</span>
                                @endif
                            </td>
                            <td>
                                @if($client->description && $client->amount)
                                    <form action="{{ route('clients.update', $client->id) }}" method="post" class="form-horizontal form-entregado">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="description" value="">
                                        <input type="hidden" name="amount" value="">
                                        <button type="submit" class="btn btn-sm btn-success">Entregar Prenda</button>
                                    </form>
                                @else
                                    <span class="bg-danger text-white rounded p-2 font-weight-bold bg-danger-subtle">No hay prendas por entregar</span>
                                @endif
                            </td>

                            <td class="td-actions text-right">
                              {{-- @can('clients.show') --}}
                              <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              {{-- @endcan --}}
                              {{-- @can('clients.edit') --}}
                              <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              {{-- @endcan --}}
                              {{-- @can('clients.destroy') --}}
                              <form action="{{ route('clients.destroy', $client->id) }}" method="post" style="display: inline-block;" class="form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>
                              {{-- @endcan --}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $clients->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
      <script>
        Swal.fire(
      'Eliminado',
      'El cliente ha sido eliminado.',
      'success'
        )
      </script>
    @endif
    <script type="text/javascript">
    $('.form-eliminar').submit(function(e){

    e.preventDefault();

    Swal.fire({
    title: '¿Esta seguro?',
    text: "El cliente se eliminara definitivamente.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        // )
        this.submit();
    }
    })
    });
    </script>

    <script type="text/javascript">
    $('.form-entregado').submit(function(e){

    e.preventDefault();

    Swal.fire({
        title: '¿Esta seguro?',
        text: "¿Cobrar y entregar la prenda?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Entregar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            this.submit();
        }
        });
    });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1000
            });
        </script>
    @endif
@endsection
