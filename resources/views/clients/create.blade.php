@extends('layouts.main', ['activePage' => 'clients'])
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('clients.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Nuevo Cliente</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="col-form-label">Nombre Completo :</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">Teléfono :</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" min="0">
                                        @if ($errors->has('phone'))
                                        <span class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">¿Dejara alguna prenda?</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="has_garment" name="has_garment">
                                        <label class="custom-control-label" for="has_garment">Marcar si dejara alguna prenda</label>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">Descripción :</label>
                                    <textarea name="description" placeholder="Este campo es (opcional)" class="form-control" id="description" cols="30" rows="10" disabled></textarea>
                                    @if ($errors->has('description'))
                                    <span class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-form-label">Monto :</label>
                                    <input type="number" id="amount" class="form-control" name="amount" disabled min="0">
                                    @if ($errors->has('amount'))
                                    <span class="error text-danger" for="input-amount">{{ $errors->first('amount') }}</span>
                                    @endif
                                </div>
                            </div>

                            <script>
                                document.getElementById("has_garment").addEventListener("change", function () {
                                    let description = document.getElementById("description");
                                    let amount = document.getElementById("amount");

                                    if (this.checked) {
                                        description.removeAttribute("disabled");
                                        amount.removeAttribute("disabled");
                                    } else {
                                        description.setAttribute("disabled", "disabled");
                                        amount.setAttribute("disabled", "disabled");
                                    }
                                });
                            </script>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a href="{{ route('clients.index') }}" class="btn btn-success mr-3">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
