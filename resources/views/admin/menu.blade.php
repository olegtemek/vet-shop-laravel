<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.home.index')}}" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item  mt-4"">
          <a href="{{route('admin.category.index')}}" class="nav-link {{(request()->is('admin/category*')) ? 'active' : ''}}">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Категории</p>
          </a>
        </li>
        <li class="nav-item  mt-4"">
          <a href="{{route('admin.filter.index')}}" class="nav-link {{(request()->is('admin/filter*')) ? 'active' : ''}}">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Фильтры</p>
          </a>
        </li>
        <li class="nav-item  mt-4"">
          <a href="{{route('admin.product.index')}}" class="nav-link {{(request()->is('admin/product*')) ? 'active' : ''}}">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Продукты</p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>