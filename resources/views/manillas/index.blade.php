@extends('layouts.main', ['activePage' => 'manillas', 'titlePage' => 'Manillas'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Manillas</h4>
                    <p class="card-category">Manillas registrados</p>
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
                        <a href="{{ route('manillas.create') }}" class="btn btn-sm btn-facebook">Registrar Manilla</a>
                        {{-- @endcan --}}
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Color</th>
                          <th>Precio</th>
                          <th>Fecha/Hora</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($manillas as $manilla)
                          <tr>
                            <td>{{ $manilla->id }}</td>
                            <td>{{ $manilla->color }}</td>
                            <td>{{ $manilla->precio }} Bs.</td>
                            <td>{{ $manilla->created_at }}</td>

                            <td class="td-actions text-right">
                              {{-- @can('user_show') --}}
                              <a href="{{ route('manillas.show', $manilla->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_edit') --}}
                              <a href="{{ route('manillas.edit', $manilla->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_destroy') --}}
                              <form action="{{ route('manillas.destroy', $manilla->id) }}" method="post" style="display: inline-block;" class="form-eliminar"> 
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form> 
                              {{-- @endcan  --}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $manillas->links() }}
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
      'La manilla ha sido eliminada.',
      'success'
        )
      </script>
    @endif
<script type="text/javascript">
  $('.form-eliminar').submit(function(e){

  e.preventDefault();
  
  Swal.fire({
  title: '¿Esta seguro?',
  text: "La manilla se eliminara definitivamente.",
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