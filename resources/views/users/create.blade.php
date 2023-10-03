@extends('layouts.main', ['activePage' => 'users'])
@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="{{ route('users.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Nuevo Usuario</h4>
            </div>
              <div class="card-body">
                <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Nombre :</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label for="username" class="col-sm-2 col-form-label">Nombre de Usuario :</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                        <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label for="ci" class="col-sm-2 col-form-label">Carnet de Identidad :</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="ci" value="{{ old('ci') }}">
                        @if ($errors->has('ci'))
                            <span class="error text-danger" for="input-ci">{{ $errors->first('ci') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label for="phone" class="col-sm-2 col-form-label">Teléfono :</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                             @if ($errors->has('phone'))
                            <span class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                  <label for="email" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                      <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <label for="password" class="col-sm-2 col-form-label">Contraseña :</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                      <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row">
                    <label for="roles" class="col-sm-2 col-form-label">Roles :</label>
                    <div class="col-3">
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <table class="table">
                                        <thead>
                                            @foreach($roles as $id => $role)
                                        </thead>
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

                    <div>
                        <input type="file" name="photo" id="photo">
                            <div class="col">
                            <img id="imagenSeleccionada" style="max-height: 200px;">
                        </div>
                        @if ($errors->has('photo'))
                            <span class="error text-danger">{{ $errors->first('photo') }}</span>
                        @endif
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <a href="{{ route('users.index') }}" class="btn btn-success mr-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
    <script>
    $(document).ready(function (e){
        $('#photo').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#imagenSeleccionada').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        });
    });
    </script>
@endsection
