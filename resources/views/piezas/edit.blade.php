@extends('layouts.main', ['activePage' => 'piezas', 'titlePage' => 'Editar Pieza'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('productos.update', $pieza->id) }}" method="post" class="form-horizontal">
          {{-- seguridad de laravel --}}
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Pieza</h4>
              <p class="card-category">Editar datos</p>
            </div>
              <div class="card-body">
              
                <div class="row">
                  <label for="nombre_chica" class="col-sm-2 col-form-label">Nombre Completo :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre_chica" value="{{ old('nombre_chica', $pieza->nombre_chica) }}" autofocus>
                    @if ($errors->has('nombre_chica'))
                      <span class="error text-danger" for="input-nombre_chica">{{ $errors->first('nombre_chica') }}</span>
                    @endif
                  </div>
                </div>
               
                <div class="row">
                  <label for="tiempo" class="col-sm-2 col-form-label">Tiempo :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="tiempo" placeholder="minutos/horas" value="{{ old('tiempo', $pieza->tiempo) }}">
                    @if ($errors->has('tiempo'))
                      <span class="error text-danger" for="input-tiempo">{{ $errors->first('tiempo') }}</span>
                    @endif
                  </div>
                </div>
               
                <div class="row">
                  <label for="hora_ingreso" class="col-sm-2 col-form-label">Hora de Ingreso :</label>
                  <div class="col-sm-7">
                    <input type="time" class="form-control" name="hora_ingreso" value="{{ old('hora_ingreso', $pieza->hora_ingreso) }}">
                    @if ($errors->has('hora_ingreso'))
                      <span class="error text-danger" for="input-hora_ingreso">{{ $errors->first('hora_ingreso') }}</span>
                    @endif
                  </div>
                </div>
             
                <div class="row">
                  <label for="hora_salida" class="col-sm-2 col-form-label">Hora de Salida :</label>
                  <div class="col-sm-7">
                    <input type="time" class="form-control" name="hora_salida" value="{{ old('hora_salida', $pieza->hora_salida) }}">
                    @if ($errors->has('hora_salida'))
                      <span class="error text-danger" for="input-hora_salida">{{ $errors->first('hora_salida') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <label for="ingreso" class="col-sm-2 col-form-label">Ingreso Total :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="ingreso" placeholder="0.00 Bs." value="{{ old('ingreso', $pieza->ingreso) }}">
                    @if ($errors->has('ingreso'))
                      <span class="error text-danger" for="input-ingreso">{{ $errors->first('ingreso') }}</span>
                    @endif
                  </div>
                </div>

                
              </div>
                <div class="card-footer ml-auto mr-auto">
                  <a href="{{ route('piezas.index') }}" class="btn btn-success mr-3"> Cancelar </a>
                  <button type="submit" class="btn btn-primary ">Actualizar</button>
                </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection