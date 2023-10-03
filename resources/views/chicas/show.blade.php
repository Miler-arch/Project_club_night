@extends('layouts.main', ['activePage' => 'chicas', 'titlePage' => 'Detalles de chica'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="card-title">{{ $chica->nombre_chica }}</div>
                  <p class="card-category">Manillas</p>
                    </div>
                      <div class="card-body">
                        @if (session('success'))
                              <div class="alert alert-success" role="success">
                                {{ session('success') }}
                              </div>
                        @endif
                        @foreach ($chica->manilla as $manilla)
                                          
                          <div class="card" style="width: 18rem;">      
                           <div class="card-body">         
                                    Color: {{ $manilla->color }} <br>
                                    Precio: {{ $manilla->precio }} Bs. <br>
                                    Cantidad: {{ $manilla->pivot->cantidad }} <br>
                                    Monto Total: {{ $manilla->pivot->monto }} Bs. <br>
                                    @if ($manilla->pivot->cantidad > 0 )
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('cambio.estado.chicas', [$chica, $manilla]) }}"
                                                title="Pendiente">
                                                Pendiente <i class='bx bx-x' style='color:#edf1f1' ></i>
                                            </a>
                                            
                                        </td>
                                    @else
                                        <td>
                                            <a class="btn btn-success" href="{{ route('cambio.estado.chicas', [$chica, $manilla]) }}"
                                                title="Cancelar">
                                                Cancelado <i class='bx bx-check' style='color:#f5f7f7'  ></i> 
                                            </a>
                                        </td>
                                    @endif 
                                </div>
                                <div class="card-footer">
                                  <div class="button-container">
                                  <a href="{{ route('chicas.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                                  </div>
                                </div>
                          </div>
                        @endforeach
                        @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" >
          <strong> Guardado!</strong> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @elseif(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert" >
              <strong> Error !</strong> {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
      @if (session('cancelado'))
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center; width:400px; margin-left:38%; border-radius:30px;">
              {{ session('cancelado') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
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

<script>
  window.setTimeout(() => {
    $(".alert").fadeTo(1500, 0).slideDown(1000, 
    function(){
      $(this).remove();
    });
  }, 700);
</script>


