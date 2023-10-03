@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Detalles del usuario'])
@section('content')
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="card-title">Usuarios</div>
                <p class="card-category">Vista detallada del usuario de {{ $user->name }}</p>
              </div>

              <div class="card-body">
              @if (session('success'))
                      <div class="alert alert-success" role="success">
                        {{ session('success') }}
                      </div>
              @endif
                <div class="row justify-content-center">
                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-header bg-primary text-white">
                              <h4 class="card-title font-weight-bold">{{ $user->name }}</h4>
                          </div>
                          <div class="card-body">
                              <div class="text-center mb-3">
                                  <img src="/imagen/{{ $user->photo }}" alt="{{ $user->name }}" width="300" height="300">
                              </div>
                              <p class="card-text">
                                    <b>Usuario:</b> {{ $user->username }}<br>
                                    <b>Email:</b> {{ $user->email }}<br>
                                    <b>Carnet de identidad:</b>{{ $user->ci }}<br>
                                    <b>Teléfono:</b>{{ $user->phone }}<br>
                                    <b>Fecha de Creación:</b> {{ $user->created_at }}
                              </p>
                              <p class="card-text">
                                  <strong>Roles:</strong>
                                  @forelse ($user->roles as $role)
                                      <span class="badge badge-dark">{{ $role->name }}</span>
                                  @empty
                                      <span class="badge badge-danger">No tiene roles</span>
                                  @endforelse
                              </p>
                          </div>
                          <div class="card-footer">
                              <div class="d-flex justify-content-center">
                                  <a href="{{ route('users.index') }}" class="btn btn-success mr-3">Volver</a>
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
