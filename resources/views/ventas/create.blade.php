{{-- @extends('layouts.main', ['activePage' => 'ventas', 'titlePage' => 'Nueva Venta'])
@section('content')
<div class="content">
        <form action="{{ route('ventas-detalles') }}" method="post" class="form-horizontal">
          {{-- seguridad de laravel --}}
          {{-- @csrf --}}
          {{-- {{ $total }} --}}
          {{-- <h1>PRODUCTOS:</h1>  
          @foreach($productos as $producto) 
                  <div class="prod">
                    <div class="card-group mt-3">
                      <div class="card text-center border-info">
                        <div class="card-body">
                          <h4 class="card-title">  <label for="nombrec" name="nombrec" id="nombrec">{{ $producto->nombre }}</label>
                            <input type="hidden" name="nombrec" id="nombrec" value="{{ $producto->nombre }}"> 
                            <input type="hidden" name="detalle" id="detalle" value="{{ $producto->precio }}"> </h4>
                          <p class="card-text"><td>
                            <img src="/imagen_productos/{{ $producto->imagen }}" width="80%">
                          </td>
                          </p>
                          <label for="detalle" name="detalle" id="detalle" style="background-color: rgb(27, 143, 197); color:white; border-radius:10px; margin-left:30px; padding-top:3px; padding-bottom:3px; padding-right:3px; padding-left:3px;">{{ $producto->precio }} Bs.</label>
                          <button class="btn btn-sm btn-warning mr-3" type="submit"> + </button>
                        </div>
                      </div>          
                    </div>
                  </div>
            @endforeach
       
        <a href="{{ route('ventas.index') }}" class="btn btn-success mr-3">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  
</div>
@endsection --}} 


