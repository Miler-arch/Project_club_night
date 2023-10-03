{{-- @extends('layouts.main', ['activePage' => 'ventas', 'titlePage' => 'Editar Venta'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('ventas.update', $venta->id) }}" method="post" class="form-horizontal">
          {{-- seguridad de laravel --}}
          {{-- @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Venta</h4>
              <p class="card-category">Editar datos</p>
            </div>
              <div class="card-body">
              
                <div class="row">
                  <label for="numero_venta" class="col-sm-2 col-form-label">Numero de venta :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="numero_venta" value="{{ old('numero_venta', $venta->numero_venta) }}" autofocus>
                    @if ($errors->has('numero_venta'))
                      <span class="error text-danger" for="input-numero_venta">{{ $errors->first('numero_venta') }}</span>
                    @endif
                  </div>
                </div>


                <div class="row">
                  <label for="costo" class="col-sm-2 col-form-label">Costo del producto :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="costo" placeholder="0.00 Bs." value="{{ old('costo', $producto->costo) }}">
                    @if ($errors->has('costo'))
                      <span class="error text-danger" for="input-costo">{{ $errors->first('costo') }}</span>
                    @endif
                  </div>
                </div>
              

                <div class="row">
                  <label for="utilidad" class="col-sm-2 col-form-label">Utilidad</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="utilidad" placeholder="0.00 Bs." value="{{ old('utilidad', $producto->utilidad) }}">
                    @if ($errors->has('utilidad'))
                      <span class="error text-danger" for="input-utilidad">{{ $errors->first('utilidad') }}</span>
                    @endif
                  </div>
                </div>
              </div>
                <div class="card-footer ml-auto mr-auto">
                  <a href="{{ route('productos.index') }}" class="btn btn-success mr-3">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection --}} 