@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Nuevo Producto'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('productos.store') }}" method="post" class="form-horizontal"  enctype="multipart/form-data">
          {{-- seguridad de laravel --}}
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Producto</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
              <div class="card-body">
                {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>
                          {{ $error }}
                        </li>
                      @endforeach
                    </ul>
                  </div>
                @endif --}}
                {{-- name --}}
                <div class="row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre del producto :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del producto" value="{{ old('nombre') }}" autofocus>
                    @if ($errors->has('nombre'))
                      <span class="error text-danger" for="input-nombre">{{ $errors->first('nombre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="quantity" class="col-sm-2 col-form-label">Stock :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="quantity" placeholder="Ingrese cantidad">
                    @if ($errors->has('quantity'))
                      <span class="error text-danger" for="input-quantity">{{ $errors->first('quantity') }}</span>
                    @endif
                  </div>
                </div>

                
                <div class="row">
                  <label for="precio" class="col-sm-2 col-form-label">Precio de Venta :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="precio" placeholder="0.00 Bs." id="Numero1">
                    @if ($errors->has('precio'))
                      <span class="error text-danger" for="input-precio">{{ $errors->first('precio') }}</span>
                    @endif
                  </div>
                </div>
               
                <div class="row">
                  <label for="costo_compania" class="col-sm-2 col-form-label">Costo de compañia :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="costo_compania" placeholder="0.00 Bs." onchange="restar(this.value);" id="Numero2">
                    @if ($errors->has('costo_compania'))
                      <span class="error text-danger" for="input-costo_compania">{{ $errors->first('costo_compania') }}</span>
                    @endif
                  </div>
                </div>
                
                <div class="row">
                  <label for="costo" class="col-sm-2 col-form-label">Costo del producto :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="costo" placeholder="0.00 Bs." onchange="restar(this.value);"  id="Numero3">
                    @if ($errors->has('costo'))
                      <span class="error text-danger" for="input-costo">{{ $errors->first('costo') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="utilidad" class="col-sm-2 col-form-label">Utilidad :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="utilidad" id="resultado">
                    <span id="spTotal"></span>
                    @if ($errors->has('utilidad'))
                      <span class="error text-danger" for="input-utilidad">{{ $errors->first('utilidad') }}</span>
                    @endif
                  </div>
                </div>
                {{-- imagen productos --}}
                <div class="row">
                  <label for="imagen" class="col-sm-2 col-form-label">Subir Imagen :</label>
                  <div class="col-sm-9">
                    <label for="imagen" class="col-sm-5 col-form-label">
                      <p> <b style="color: rgb(42, 43, 43)">SELECCIONE LA IMAGEN</b> </p>
                      <input name="imagen" id="imagen" type="file" >
                    </label>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-7">
                      <img id="imagenSeleccionada" style="max-height: 300px; margin-left: 30%;">
                  </div>
                </div>

                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{ route('productos.index') }}" class="btn btn-success mr-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function (e){
    $('#imagen').change(function(){
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });
</script>

