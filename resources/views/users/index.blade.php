@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Usuarios</h4>
                    <p class="card-category">Usuarios registrados</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 text-right">
                        @can('users.create')
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir Usuario</a>
                        @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Correo Electrónico</th>
                          <th>Nombre de Usuario</th>
                          <th>Fecha de Creación</th>
                          <th>Roles</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                              @forelse ($user->roles as $role)
                                  <span class="badge badge-info">{{ $role->name }}</span>
                              @empty
                                  <span class="badge badge-danger">No tiene rol</span>
                              @endforelse
                              </td>
                            <td class="td-actions text-right">
                              @can('users.show')
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              @endcan
                              @can('users.edit')
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              @endcan
                              @can('users.destroy')
                              <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block;" class="form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>
                              @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $users->links() }}
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
      'El usuario ha sido eliminado.',
      'success'
        )
      </script>
    @endif
    <script type="text/javascript">
    $('.form-eliminar').submit(function(e){

    e.preventDefault();

    Swal.fire({
    title: '¿Esta seguro?',
    text: "El usuario se eliminara definitivamente.",
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
