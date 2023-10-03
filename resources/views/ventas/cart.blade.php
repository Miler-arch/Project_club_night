@extends('layouts.main', ['activePage' => 'ventas', 'titlePage' => 'Nueva Venta'])
@section('content')
        <div class="container" style="margin-top: 80px">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/ventas/create"
                            style="background-color: rgb(18, 169, 51); color:white;
                        border-radius:7px; padding:5px 5px 5px 5px">Agregar
                            + Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"
                        style="color: yellow; font-family: 'Lobster', cursive; font-size:20px">Ventas registradas</li>
                </ol>
            </nav>
            
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    {{-- tabla de productos --}}
                    <div class="row">
                        @foreach ($cartCollection as $item)
                            <div class="col-lg-3">
                                <img src="/imagen_productos/{{ $item->attributes->imagen }}" class="img-thumbnail"
                                    width="200" height="200" style="background:#0a3f48a3;">
                                    <br><br>
                            </div>
                            <div class="col-lg-5">
                                <p>
                                    <br>
                                    <b><a href="/ventas/create{{ $item->attributes->slug }}"
                                            style="color: rgba(255, 255, 255, 0.914)">{{ $item->name }}</a></b><br>
                                    <b style="color: white">Precio: {{ $item->price }} Bs.</b><br>
                                    <b
                                        style="color: rgb(253, 219, 3); background-color:rgb(25, 26, 29); border-radius:15px; padding:4px 4px 4px 4px">Sub
                                        Total: {{ \Cart::get($item->id)->getPriceSum() }} Bs. </b><br>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control form-control-sm" value="{{ $item->quantity }}" min="1"
                                                style="width: 35px; margin-right: 10px; color:white">
                                            <button class="btn btn-secondary btn-sm"
                                                style="margin-right: 0px; background-color:rgb(11, 160, 240); color:white">
                                                <i class='bx bx-refresh bx-rotate-270 bx-tada' style='color:#fdfdfd; font-size:15px'></i>Actualizar Cantidad</button>
                                        </div>
                                    </form>

                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger btn-sm" style="margin-top: -25px; margin-left:26%; width:175px;">
                                            <i class='bx bx-trash bx-rotate-270 bx-tada' style='color:#ffffff; font-size:15px; '></i>Borrar Producto</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                    </div>
                </div>
                @if (count($cartCollection) > 0)
                    <div class="col-lg-5">

                        <form action="{{ route('cart.save') }}" method="post" class="backk">
                            {{ csrf_field() }}
                            <input type="hidden" id="total" name="total" value="{{ \Cart::getTotal() }}">

                            <b style="color:white; font-weight:bold">SELECCIONAR GARZÓN: </b>

                            <select id="user_id" name="user_id" style="padding: 9px 9px 9px 9px; border-radius:49px; width:263px">
                                @foreach ($users as $user)
                                    <option id="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Total: </b>{{ \Cart::getTotal() }} Bs.</li>
                                </ul>
                            </div>
                            
                            <br><a href="/ventas/create" class="btn btn-success">Agregar + Productos</a>
                            <button type="submit" class="btn btn-info">Enviar</button>
                            <br>
                            <hr>
                                @if (session()->has('success_msg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 35px">
                                    {{ session()->get('success_msg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                @if (session()->has('alert_msg'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session()->get('alert_msg') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    @foreach ($errors0 > all() as $error)
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ $error }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endforeach
                            @endif
                    </div>
                @endif
            </div>
            <br><br>
        </div>
    </form>
@endsection
<script>
    window.setTimeout(() => {
        $(".alert").fadeTo(1500, 0).slideDown(1000,
            function() {
                $(this).remove();
            });
    }, 700);
</script>
