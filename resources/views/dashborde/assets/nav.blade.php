<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="http://127.0.0.1:8000/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
        alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Alexander Pierce</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
    <div class="sidebar-search-results">
      <div class="list-group"><a href="#" class="list-group-item">
          <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong
              class="text-light"></strong> <strong class="text-light"></strong>e<strong
              class="text-light"></strong>l<strong class="text-light"></strong>e<strong
              class="text-light"></strong>m<strong class="text-light"></strong>e<strong
              class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong>
            <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong
              class="text-light"></strong>u<strong class="text-light"></strong>n<strong
              class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong>
          </div>
          <div class="search-path"></div>
        </a></div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Starter Pages
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Active Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive Page</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>


      <li class="nav-item menu-is-opening menu-open">

        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Categorie
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Index</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('categories.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item menu-is-opening menu-open">

        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Product
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
          <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Index</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('products.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav> <!-- /.sidebar-menu -->
</div>