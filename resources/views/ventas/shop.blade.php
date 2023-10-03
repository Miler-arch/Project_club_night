@extends('layouts.main', ['activePage' => 'ventas', 'titlePage' => 'Nueva Venta'])

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item activation"><a href="/ventas" style="color: white" >VOLVER A LA LISTA DE VENTAS</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: yellow; font-family: 'Lobster', cursive; font-size:20px">Productos :</li>
                <li class="activation1"><a href="/cart" style="color: white; " >SEGUIR CON LA VENTA</a></li>
            </ol>
        </nav>
        <form class="form-inline my-2 my-lg-0">

        <input type="search" name="buscador" class="form-control mr-sm-2" placeholder="Buscar..." aria-label="Buscar">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($productos as $producto)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto; background:#0a3f48a3;">
                                <img src="/imagen_productos/{{ $producto->imagen }}" width="80%"
                                     class="card-img-top mx-auto"
                                     style="height: 200px; width: 200px;display: block;"
                                     alt="{{ $producto->imagen }}">
                                     
                                <div class="card-body">
                                    <a><h6 class="card-title" style="color: white; text-align:center;">{{ $producto->nombre }}</h6></a>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $producto->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $producto->nombre }}" id="nombre" name="nombre">
                                        <input type="hidden" value="{{ $producto->precio }}" id="precio" name="precio">
                                        <input type="hidden" value="{{ $producto->imagen }}" id="imagen" name="imagen">
                                        <input type="hidden" value="{{ $producto->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="Agregar producto" style="background-color: rgb(38, 36, 36); border-radius:20px; margin-left:18%" >
                                                    <small style="background-color:rgb(243, 181, 11); font-size:15px; border-radius:20px; padding: 5px 5px 5px 5px;">{{ $producto->precio }} Bs.</small>
                                                    <i class="fa fa-shopping-cart" style="color: white"></i> <small style="color: white">Agregar</small> 
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
