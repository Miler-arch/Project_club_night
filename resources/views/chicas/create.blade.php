@extends('layouts.main', ['activePage' => 'chicas'])
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('chicas.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nueva Chica</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-form-label">Nombre Completo :</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>

                                <div class="col-4">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" autocomplete="off">
                                </div>

                                <div class="col-4">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label">¿Tiene Carnet de Sanidad?</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="has_health_card">
                                        <label class="custom-control-label" for="has_health_card">Marcar si tiene carnet</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label">Fecha de Vencimiento</label>
                                    <input type="date" class="form-control" name="health_card_expiry_date" id="health_card_expiry_date" disabled>
                                </div>


                                <div class="col-4">
                                    <label class="col-form-label">Código :</label>
                                    <input type="number" class="form-control" name="code_card" value="{{ old('code_card') }}" autofocus min="0" id="code" disabled>
                                        @if ($errors->has('code_card'))
                                            <span class="error text-danger">{{ $errors->first('code_card') }}</span>
                                        @endif
                                </div>

                                <script>
                                    document.getElementById("has_health_card").addEventListener("change", function () {
                                        let expireDate = document.getElementById("health_card_expiry_date");
                                        let codeActive = document.getElementById("code");

                                        if (this.checked) {
                                            expireDate.removeAttribute("disabled");
                                            codeActive.removeAttribute("disabled");
                                        } else {
                                            expireDate.setAttribute("disabled", "disabled");
                                            codeActive.setAttribute("disabled", "disabled");
                                        }
                                    });
                                </script>

                                <div class="col-4">
                                    <label class="col-form-label">Carnet de Identidad :</label>
                                    <input type="number" class="form-control" name="ci" value="{{ old('ci') }}" autofocus min="0">
                                        @if ($errors->has('ci'))
                                            <span class="error text-danger">{{ $errors->first('ci') }}</span>
                                        @endif
                                </div>


                                <div class="col-4">
                                    <label class="col-form-label">Teléfono :</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" autofocus min="0">
                                    @if ($errors->has('phone'))
                                        <span class="error text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-4">
                                    <label class="col-form-label">Edad :</label>
                                    <input type="number" class="form-control" name="age" value="{{ old('age') }}" min="18" autofocus>
                                        @if ($errors->has('age'))
                                            <span class="error text-danger">{{ $errors->first('age') }}</span>
                                        @endif
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label">Subir Imagen :</label>
                                    <label class="col-form-label">
                                    <p> <b style="color: rgb(42, 43, 43)">SELECCIONE LA IMAGEN</b> </p>
                                        <input name="image" id="image" type="file">
                                        @if ($errors->has('image'))
                                            <span class="error text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </label>
                                    <div class="col">
                                        <img id="imagenSeleccionada" style="max-height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a href="{{ route('chicas.index') }}" class="btn btn-success mr-3">Cancelar</a>
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
        $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#imagenSeleccionada').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
        });
    });
    </script>
@endsection
