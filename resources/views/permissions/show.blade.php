@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Detalles del permiso'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="card-title">Permisos</div>
                <p class="card-category">Vista detallada del permiso de {{ $permission->name }}</p>
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
                              <h5 class="title mx-3">{{ $permission->name }}</h5>
                            </a>
                            <p class="description">
                              {{ $permission->guard_name }} <br>
                              {{ $permission->created_at }}
                            </p>
                          </div>
                        </p>
                        <div class="card-description">
                          {{-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis quibusdam placeat. --}}
                        </div> 
                      </div>
                      <div class="card-footer">
                        <div class="button-container">
                          <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
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