@extends('layouts.main', ['activePage' => 'piezas', 'titlePage' => 'Detalles de la pieza'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="card-title">Piezas</div>
                <p class="card-category">Vista detallada del producto de {{ $pieza->nombre_chica }}</p>
              </div>

              <div class="card-body">
              @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
              @endif
                <div class="row">
                  <div class="col-md-3">
                    <div class="card card-user">
                      <div class="card-body">
                        <p class="card-text">
                          <div class="author">
                            <a href="#" class="d-flex">
                              <img src="{{ asset('/img/avatar.png') }}" alt="avatar" class="avatar">
                              <h5 class="title mx-3">{{ $pieza->nombre_chica }}</h5>
                            </a>
                            <p class="description">
                              {{ $pieza->nombre_chica }} <br>
                              {{ $pieza->tiempo }} <br>
                              {{ $pieza->hora_ingreso }} <br>
                              {{ $pieza->hora_salida }} <br>
                              {{ $pieza->ingreso }} <br>
                              {{ $pieza->created_at }}
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
                          <a href="{{ route('piezas.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
        
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