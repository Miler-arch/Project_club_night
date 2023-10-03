@extends('layouts.main', ['activePage' => 'ventas', 'titlePage' => 'Ventas'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Ventas</h4>
                    <p class="card-category">Ventas registradas</p>
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
                         <a href="{{ route('ventas.create') }}" class="btn btn-sm btn-facebook">Nueva Venta</a>
                        {{-- @endcan --}}
                        {{-- 'numero_venta', --}}
                        {{-- 'user_id',
                        'total' --}}
                       </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>Numero de Venta</th>
                          <th>Garzón</th>
                          <th>Total</th>
                          <th>Fecha/Hora</th>
                          <th>Estado</th>
                          {{-- <th class="text-right">Acciones</th> --}}
                        </thead>
                        <tbody>
                          @foreach ($ventas as $venta)
                          <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->user->name }}</td>
                            <td>{{ $venta->total }} Bs.</td>
                            <td>{{ $venta->created_at }}</td>
                            
                            @if ($venta->estado == 'PENDIENTE')
                                <td>
                                    <a class="btn btn-warning" href="{{ route('cambio.estado.ventas', $venta) }}"
                                        title="Pendiente">
                                        Pendiente <i class='bx bx-x' style='color:#edf1f1' ></i>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a class="btn btn-success" href="{{ route('cambio.estado.ventas', $venta) }}"
                                        title="Cancelar">
                                        Cancelado <i class='bx bx-check' style='color:#f5f7f7'  ></i>
                                    </a>
                                </td>
                            @endif
                      
                            
                            <td class="td-actions text-right">
                              {{-- @can('user_show') --}}
                              {{-- <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-info"><i class="material-icons">person</i></a> --}}
                              {{-- @endcan --}}
                              {{-- @can('user_edit') --}}
                              {{-- <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a> --}}
                              {{-- @endcan --}}
                              {{-- @can('user_destroy') --}}
                              {{-- <form action="{{ route('ventas.destroy', $venta->id) }}" method="post" style="display: inline-block;" class="form-eliminar"> 
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form>  --}}
                              {{-- @endcan  --}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $ventas->links() }}
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> Guardado!</strong> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @elseif(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert" >
              <strong> Error !</strong> {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      @if (session('cancelado'))
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center; width:400px; margin-left:38%; border-radius:30px;">
              {{ session('cancelado') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
      <script>
        Swal.fire(
      'Eliminado',
      'La venta ha sido eliminada.',
      'success'
        )
      </script>
    @endif
<script type="text/javascript">
  $('.form-eliminar').submit(function(e){

  e.preventDefault();
  
  Swal.fire({
  title: '¿Esta seguro?',
  text: "La venta se eliminara definitivamente.",
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

<script>
  window.setTimeout(() => {
    $(".alert").fadeTo(1500, 0).slideDown(1000, 
    function(){
      $(this).remove();
    });
  }, 700);
</script>
@endsection