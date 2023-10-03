<div class="sidebar" data-color="orange">

  <div class="logo">
    <a class="simple-text logo-normal text-1">
    {{ __('La Casa de Senet') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      @can('users.index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class='bx bx-user-plus' style='color:#0ba1f7'  ></i>
            <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
      @endcan

      {{-- @can('users.index') --}}
        <li class="nav-item{{ $activePage == 'clients' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('clients.index') }}">
            <i class='bx bxs-user-rectangle' style='color:#0981d1'></i>
                <p>{{ __('Clientes') }}</p>
            </a>
        </li>
      {{-- @endcan --}}

        <li class="nav-item{{ $activePage == 'porterias' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('porterias.index') }}">
            <i class='bx bx-desktop' style='color:#09d14f'></i>
                <p>{{ __('Porteria') }}</p>
            </a>
        </li>

      @can('permissions.index')
      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('permissions.index') }}">
          <i class='bx bxs-lock' style='color:#ea8c0e'  ></i>
          <p>{{ __('Permisos') }}</p>
        </a>
      </li>
      @endcan
      @can('roles.index')
      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class='bx bxs-user-badge' style='color:#0be4ec'  ></i>
            <p>{{ __('Roles') }}</p>
        </a>
      </li>
      @endcan

      <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('productos.index') }}">
          <i class='bx bx-cart' style='color:#e8f510'  ></i>
          <p>{{ __('Productos') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'ventas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ventas.index') }}">
          <i class='bx bxs-store-alt' style='color:#ee5909'  ></i>
          <p>{{ __('Ventas') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'chicas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('chicas.index') }}">
          <i class='bx bx-female' style='color:#ef0c99'  ></i>
          <p>{{ __('Chicas') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'manillas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('manillas.index') }}">
          <i class='bx bx-circle' style='color:#b506f1'  ></i>
          <p>{{ __('Manillas') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'piezas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('piezas.index') }}">
          <i class='bx bx-door-open' style='color:#0decea'  ></i>
          <p>{{ __('Piezas') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'reportes' ? ' active' : '' }}">
        <a class="nav-link" href="">
          <i class='bx bxs-report' style='color:#7aec07'  ></i>
          <p>{{ __('Reportes') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'gastos' ? ' active' : '' }}">
        <a class="nav-link" href="">
          <i class='bx bx-money-withdraw' style='color:#0897f7'  ></i>
          <p>{{ __('Gastos') }}</p>
        </a>
      </li>


    </ul>
  </div>
</div>
