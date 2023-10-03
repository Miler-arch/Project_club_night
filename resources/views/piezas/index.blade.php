@extends('layouts.main', ['activePage' => 'piezas', 'titlePage' => 'Piezas'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Piezas</h4>
                    <p class="card-category">Piezas registradas</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        {{-- @can('user_create') --}}
                        <a href="{{ route('piezas.create') }}" class="btn btn-sm btn-facebook">Registrar Pieza</a>
                        {{-- @endcan --}}
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          {{-- $table->id();
                          $table->string('nombre_chica');
                          $table->integer('tiempo');
                          $table->time('hora_ingreso');
                          $table->time('hora_salida');
                          $table->integer('ingreso');    
                          $table->timestamps(); --}}
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Tiempo</th>
                          <th>Horario/Ingreso</th>
                          <th>Horario/Salida</th>
                          <th>Ingreso Total</th>
                          <th>Fecha de Creación</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($piezas as $pieza)
                          <tr>
                            <td>{{ $pieza->id }}</td>
                            <td>{{ $pieza->nombre_chica }}</td>
                            <td>{{ $pieza->tiempo }}</td>
                            <td>{{ $pieza->hora_ingreso }}</td>
                            <td>{{ $pieza->hora_salida }}</td>
                            <td>{{ $pieza->ingreso }}</td>
                            <td>{{ $pieza->created_at }}</td>

                            {{-- $table->id();
                            $table->string('nombre');
                            $table->integer('costo');
                            $table->integer('precio');
                            $table->integer('costo_compania');
                       
                            $table->integer('utilidad');
                            $table->timestamps(); --}}
                            {{-- <td>
                              @forelse ($user->roles as $role)
                                  <span class="badge badge-info">{{ $role->name }}</span>
                              @empty
                                  <span class="badge badge-danger">No tiene rol</span>
                              @endforelse
                              </td> --}}
                            <td class="td-actions text-right">
                              {{-- @can('user_show') --}}
                              <a href="{{ route('piezas.show', $pieza->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_edit') --}}
                              <a href="{{ route('piezas.edit', $pieza->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_destroy') --}}
                              <form action="{{ route('piezas.destroy', $pieza->id) }}" method="post" style="display: inline-block;" class="form-eliminar"> 
                              @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>   
                              {{-- @endcan   --}}
                            {{-- </td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $piezas->links() }}
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
      'La pieza ha sido eliminada.',
      'success'
        )
      </script>
    @endif
<script type="text/javascript">
  $('.form-eliminar').submit(function(e){

  e.preventDefault();
  
  Swal.fire({
  title: '¿Esta seguro?',
  text: "La pieza se eliminara definitivamente.",
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
@endsection 