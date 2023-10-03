@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Detalles del producto'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="card-title">Productos</div>
                <p class="card-category">Vista detallada del producto de {{ $producto->nombre }}</p>
              </div>

              <div class="card-body">
              @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
              @endif
                <div class="row">
                  <div class="col-md-5">
                    <div class="card card-user">
                      <div class="card-body">
                        <p class="card-text">
                          <div class="author">
                            <a href="#" class="d-flex">
                              <img src="{{ asset('/img/avatar.png') }}" alt="avatar" class="avatar">
                              <h5 class="title mx-3">{{ $producto->nombre }}</h5>
                            </a>
                            <p class="description">
                               Precio de venta: {{ $producto->precio }} Bs. <br> 
                               Costo de compañia: {{ $producto->costo_compania }} Bs. <br>
                               Costo del producto: {{ $producto->costo }} Bs. <br>
                               <b style="color: rgb(25, 194, 59)" class="texto-verde">Utilidad: {{ $producto->utilidad }} Bs. <br></b>
                               Fecha/Hora: {{ $producto->created_at }}

                              {{-- {-- $table->id();
                                $table->string('nombre');
                                $table->integer('costo');
                                $table->integer('precio');
                                $table->integer('costo_compania');
                          
                                $table->integer('utilidad');
                                $table->timestamps(); --}} 
                              {{-- <p>	
                                @forelse ($user->roles as $role)
                                    <span class="badge rounded-pill bg-dark text-white">{{ $role->name }}</span>
                                @empty
                                    <span class="badge badge-danger bg-danger">No tiene roles</span>
                                @endforelse
                              </p> --}}
                            </p>
                          </div>
                        </p>
                        {{-- <div class="card-description">
                          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis quibusdam placeat.
                        </div> --}}
                      </div>
                      <div class="card-footer">
                        <div class="button-container">
                          <a href="{{ route('productos.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection