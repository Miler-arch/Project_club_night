@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Productos</h4>
                    <p class="card-category">Productos registrados</p>
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
                        <a href="{{ route('productos.create') }}" class="btn btn-sm btn-facebook">Registrar Producto</a>
                        {{-- @endcan --}}
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead style="background-color: rgb(21, 18, 19); color:rgb(243, 192, 5) ">
                          <th style="border-radius:20px 0px 0px 20px">ID</th>
                          <th>Nombre</th>
                          <th>Stock</th>
                          <th>Precio de <br> Venta</th>
                          <th>Costo de <br> Compañia</th>
                          <th>Costo del <br> Producto</th>
                          <th style="text-align: center">Utilidad</th>
                          {{-- <th>Fecha/Hora</th> --}}
                          <th style="text-align: center">Imagen</th>
                          <th style="padding-left: 42px">Estado</th> 
                          <th class="text-right" style="border-radius:0px 20px 20px 0px">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($productos as $producto)
                          <tr>
                            <td>{{ $producto->id }}</td>
                            <td><b style="color: rgb(238, 245, 245); background-color:rgb(18, 118, 240); padding:5px 5px 5px 5px; border-radius:20px"> {{ $producto->nombre }}</b></td>
                            <td>{{ $producto->quantity }}</td>
                            <td>Bs. {{ $producto->precio }}</td>
                            <td>Bs. {{ $producto->costo_compania }}</td>
                            <td>Bs.  {{ $producto->costo }}</td>
                            <td style="color: rgb(38, 225, 21); font-size:25px; font-weight:bold; text-align:center" class="texto-utilidad"> Bs. {{ $producto->utilidad }} </td>
                            <td>
                              <img src="/imagen_productos/{{ $producto->imagen }}" width="100%">
                            </td>
                             @if ( $producto->estado == 'HABILITADO')
                             <td>
                              <a class="jsgrid-button btn btn-success" href="{{ route('cambiar_estado', $producto) }}" title="Editar">
                              <i class='bx bx-checkbox-checked' style='color:#f9f7f7; font-size:19px'>Activo</i>
                              </a>
                             </td>
                             @else
                             <td>
                             <a class="jsgrid-button btn btn-danger" href="{{ route('cambiar_estado', $producto) }}" title="Editar">
                              <i class='bx bx-window-close' style='color:#f9f7f7; font-size:19px' >Inactivo</i>
                              </a>
                            </td>
                                 
                            
                                 
                             @endif
                            

                            <td class="td-actions text-right">
                              {{-- @can('user_show') --}}
                              <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info"><i class="material-icons">person</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_edit') --}}
                              <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                              {{-- @endcan --}}
                              {{-- @can('user_destroy') --}}
                              <form action="{{ route('productos.destroy', $producto->id) }}" method="post" style="display: inline-block;" class="form-eliminar"> 
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                  <i class="material-icons">close</i>
                                </button>
                              </form> 
                              {{-- @endcan   --}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $productos->links() }}
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
      'El producto ha sido eliminado.',
      'success'
        )
      </script>
    @endif
<script type="text/javascript">
  $('.form-eliminar').submit(function(e){

  e.preventDefault();
  
  Swal.fire({
  title: '¿Esta seguro?',
  text: "El producto se eliminara definitivamente.",
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