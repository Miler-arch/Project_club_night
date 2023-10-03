@extends('layouts.main', ['activePage' => 'piezas', 'titlePage' => 'Nueva Pieza'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('piezas.store') }}" method="post" class="form-horizontal">
          {{-- seguridad de laravel --}}
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Pieza</h4>
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
                  <label for="nombre_chica" class="col-sm-2 col-form-label">Nombre Completo :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre_chica" placeholder="Nombre completo" value="{{ old('nombre_chica') }}" autofocus>
                    @if ($errors->has('nombre_chica'))
                      <span class="error text-danger" for="input-nombre_chica">{{ $errors->first('nombre_chica') }}</span>
                    @endif
                  </div>
                </div>
                {{-- username --}}
                {{-- $table->id();
                $table->string('nombre_chica');
                $table->integer('tiempo');
                $table->time('hora_ingreso');
                $table->time('hora_salida');
                $table->integer('ingreso');    
                $table->timestamps(); --}}
                <div class="row">
                  <label for="tiempo" class="col-sm-2 col-form-label">Tiempo :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="tiempo" placeholder="minutos/horas" value="{{ old('tiempo') }}">
                    @if ($errors->has('tiempo'))
                      <span class="error text-danger" for="input-tiempo">{{ $errors->first('tiempo') }}</span>
                    @endif
                  </div>
                </div>
                {{-- email --}}
                <div class="row">
                  <label for="hora_ingreso" class="col-sm-2 col-form-label">Hora de Ingreso :</label>
                  <div class="col-sm-7">
                    <input type="time" class="form-control" name="hora_ingreso">
                    @if ($errors->has('hora_ingreso'))
                      <span class="error text-danger" for="input-hora_ingreso">{{ $errors->first('hora_ingreso') }}</span>
                    @endif
                  </div>
                </div>
                {{-- password --}}
                <div class="row">
                  <label for="hora_salida" class="col-sm-2 col-form-label">Hora de Salida :</label>
                  <div class="col-sm-7">
                    <input type="time" class="form-control" name="hora_salida">
                    @if ($errors->has('hora_salida'))
                      <span class="error text-danger" for="input-hora_salida">{{ $errors->first('hora_salida') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="ingreso" class="col-sm-2 col-form-label">Ingreso :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="ingreso">
                    @if ($errors->has('ingreso'))
                      <span class="error text-danger" for="input-ingreso">{{ $errors->first('ingreso') }}</span>
                    @endif
                  </div>
                </div>

                
                
                {{-- <div class="row">
                  <label for="roles" class="col-sm-2 col-form-label">Roles :</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <div class="tab-content">
                        <div class="tab-pane active">
                          <table class="table">
                            <tbody>
                              @foreach($roles as $id => $role)
                            </tbody>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="roles[]"
                                      value="{{ $id }}">
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  {{ $role }}
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{ route('piezas.index') }}" class="btn btn-success mr-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection