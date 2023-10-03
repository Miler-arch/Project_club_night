@extends('layouts.main', ['activePage' => 'manillas', 'titlePage' => 'Nuevo Manilla'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('manillas.store') }}" method="post" class="form-horizontal">
          {{-- seguridad de laravel --}}
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Manilla</h4>
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
                  <label for="color" class="col-sm-2 col-form-label">Color de la Manilla :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="color" placeholder="Ingrese el color de la manilla" value="{{ old('color') }}" autofocus>
                    @if ($errors->has('color'))
                      <span class="error text-danger" for="input-color">{{ $errors->first('color') }}</span>
                    @endif
                  </div>
                </div>
                
                <div class="row">
                  <label for="precio" class="col-sm-2 col-form-label">Precio :</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" name="precio" placeholder="0.00 Bs." >
                    @if ($errors->has('precio'))
                      <span class="error text-danger" for="input-precio">{{ $errors->first('precio') }}</span>
                    @endif
                  </div>
                </div>
          
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{ route('manillas.index') }}" class="btn btn-success mr-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

