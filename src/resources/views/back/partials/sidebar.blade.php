  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="{{ asset('assets/AdminLTE-3.0.4/dist/img/logouts.png') }}" alt="Logo UTS" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Educación Continua</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/AdminLTE-3.0.4/dist/img/avatar-default-icon-128x128.png') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->nombre }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                              Sistema
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @can('leer estudiantes')
                          <li class="nav-item">
                              <a href="{{ route('estudiantes.index') }}" class="nav-link {{ (request()->is('admin/usuarios*')) ? 'active' : '' }}">
                                  <!-- <i class="nav-icon fas fa-table"></i> -->
                                  <i class="icon ion-ios-circle-outline mx-2"></i>
                                  <p>Estudiantes</p>
                              </a>
                          </li>
                          @endcan

                          @can('leer usuarios')
                          <li class="nav-item">
                              <a href="{{ route('usuarios.index') }}" class="nav-link {{ (request()->is('admin/usuarios*')) ? 'active' : '' }}">
                                  <!-- <i class="nav-icon fas fa-table"></i> -->
                                  <i class="icon ion-ios-circle-outline mx-2"></i>
                                  <p>Usuarios</p>
                              </a>
                          </li>
                          @endcan
                          <!-- <li class="nav-item">
                              <a href="#" class="nav-link {{ (request()->is('generar-referencia')) ? 'active' : '' }}">
                                  <i class="nav-icon far fa-plus-square"></i>
                                  <p>Nuevo Pago</p>
                              </a>
                          </li> -->
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>