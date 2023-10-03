@extends('layouts.main', ['activePage' => 'chicas', 'titlePage' => 'Chicas'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Chicas</h4>
                    <p class="card-category">Chicas registradas</p>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 text-right">
                        <a href="{{ route('chicas.create') }}" class="btn btn-sm btn-facebook">Registrar Chica</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Código</th>
                            <th>Carnet de Identidad</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Fecha de Creación</th>
                            <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($chicas as $index => $chica)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $chica->name }}</td>
                                <td>{{ $chica->age }}</td>
                                <td>
                                    @if($chica->health_card_expiry_date)
                                        <span class="bg-primary rounded text-white font-weight-bold p-2">{{ $chica->health_card_expiry_date }}</span>
                                    @else
                                        <span class="bg-danger rounded text-white font-weight-bold p-2">No registrado</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($chica->code_card)
                                        <span class="bg-primary rounded text-white font-weight-bold p-2">{{ $chica->code_card }}</span>
                                    @else
                                        <span class="bg-danger rounded text-white font-weight-bold p-2">No registrado</span>
                                    @endif
                                </td>
                                <td>{{ $chica->ci }}</td>
                                <td>{{ $chica->phone }}</td>
                                <td>
                                    @if ($chica->state_chica === 1)
                                        <span class="badge-success rounded p-2 pl-5 pr-5 font-weight-bold">Activo</span>
                                    @elseif ($chica->state_chica === 0)
                                        <span class="badge-danger rounded p-2 pl-5 pr-5 font-weight-bold">Inactivo</span>
                                    @elseif ($chica->state_chica === 2)
                                        <span class="badge-warning rounded p-2 pl-5 pr-5 font-weight-bold">Bloqueado</span>
                                    @endif
                                </td>
                              <td>
                                <img src="/imagen/{{ $chica->image }}" width="50%">
                              </td>
                              <td>{{ $chica->created_at }}</td>
                              <td class="td-actions text-right">
                                <a href="{{ route('chicas.show', $chica->id) }}"><button style="background-color: cornflowerblue;
                                  color:white;
                                  border-radius:20px;
                                  cursor: pointer;
                                  border: 0;"> Ver manillas </button>
                                <a href="{{ route('chicas.edit', $chica->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <form action="{{ route('chicas.destroy', $chica->id) }}" method="post" style="display: inline-block;" class="form-eliminar">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit">
                                    <i class="material-icons">close</i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                        <div class="card-footer justify-content-center">
                          {{ $chicas->links() }}
                        </div>
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
