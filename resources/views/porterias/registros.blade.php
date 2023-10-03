@extends('layouts.main', ['activePage' => 'porterias', 'titlePage' => 'Porteria'])
@section('content')
    <div class="content">
      <div class="content-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Porteria</h4>
                    <p class="card-category">Registros de porteria</p>
                    <a href="{{route('porterias.index')}}" class="btn bg-dark float-right">Atras</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-shopping">
                        <thead class="text-primary">
                            <th class="font-weight-bold">ID</th>
                            <th class="font-weight-bold">Nombre</th>
                            <th class="font-weight-bold">Estado</th>
                            <th class="font-weight-bold">Motivo</th>
                            <th class="font-weight-bold">Fecha / Hora</th>
                        </thead>
                        <tbody>
                          @foreach ($porterias as $porteria)
                          <tr>
                            <td>{{ $porteria->id }}</td>
                            <td>
                                @if ($porteria->user != null)
                                    {{ $porteria->user->name }}
                                @elseif ($porteria->chica != null)
                                    {{ $porteria->chica->name }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('porterias.show', $porteria)}}">{{ $porteria->type_entry }}</a>
                            </td>
                            <td>
                              @if ($porteria->reason)
                                  {{ $porteria->reason }}
                              @else
                                <span class="text-danger">No tiene motivo</span>
                              @endif

                            </td>
                            <td>{{ $porteria->created_at }}</td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer justify-content-center">
                      {{ $porterias->links() }}
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
