@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Permisos</h4>
                    <p class="card-category">Permisos registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        @can('permissions.create')
                        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-facebook">Añadir Permiso</a>
                        @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Nombre</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @forelse ($permissions as $permission)
                          <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="td-actions text-right">
                              @can('permissions.show')
                              <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              @endcan
                              @can('permissions.edit')
                              <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              @can('permissions.destroy')
                              <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline-block;" class="form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>
                              @endcan
                            </td>
                          </tr>
                          @empty
                          No hay permisos registrados aún.
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $permissions->links() }}
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
      'El permiso ha sido eliminado.',
      'success'
        )
      </script>
    @endif
<script type="text/javascript">
  $('.form-eliminar').submit(function(e){

  e.preventDefault();

  Swal.fire({
  title: '¿Esta seguro?',
  text: "El permiso se eliminara definitivamente.",
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
