  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-user-circle"></i> <span class="d-none d-md-inline-block">{{ auth()->user()->nombre_completo }}</span>
                  
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header d-inline-block d-md-none">{{ auth()->user()->nombre_completo }}</span>
                 
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('admin.logout') }}" class="dropdown-item">
                      <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                      <span class="float-right text-muted text-sm"></span>
                  </a>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->