@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Editar Producto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('productos.update', $producto->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{-- seguridad de laravel --}}
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Producto</h4>
              <p class="card-category">Editar datos</p>
            </div>
              <div class="card-body">

                <div class="row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre del producto :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre) }}" autofocus>
                    @if ($errors->has('nombre'))
                      <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                    @endif
                  </div>
                </div>


                <div class="row">
                  <label for="precio" class="col-sm-2 col-form-label">Precio de venta</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="precio" placeholder="0.00 Bs." value="{{ old('precio', $producto->precio) }}" onchange="restar(this.value);" id="Numero1">
                    @if ($errors->has('precio'))
                      <span class="error text-danger" for="input-precio">{{ $errors->first('precio') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="costo_compania" class="col-sm-2 col-form-label">Costo de compañia</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="costo_compania" placeholder="0.00 Bs." value="{{ old('costo_compania', $producto->costo_compania) }}" onchange="restar(this.value);" id="Numero2">
                    @if ($errors->has('costo_compania'))
                      <span class="error text-danger" for="input-costo_compania">{{ $errors->first('costo_compania') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="costo" class="col-sm-2 col-form-label">Costo del producto :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="costo" placeholder="0.00 Bs." value="{{ old('costo', $producto->costo) }}" onchange="restar(this.value);"  id="Numero3">
                    @if ($errors->has('costo'))
                      <span class="error text-danger" for="input-costo">{{ $errors->first('costo') }}</span>
                    @endif
                  </div>
                </div>


                <div class="row">
                  <label for="utilidad" class="col-sm-2 col-form-label">Utilidad</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="utilidad" placeholder="0.00 Bs." value="{{ old('utilidad', $producto->utilidad) }}" id="resultado">
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
@endsection

<script>
  function restar () {
  var Numero1 = Number(document.getElementById('Numero1').value);
  var Numero2 = Number(document.getElementById('Numero2').value);
  var Numero3 = Number(document.getElementById('Numero3').value);

  var resultado = Numero1 - Numero2 - Numero3

  document.getElementById('resultado').value = resultado
}
</script>
