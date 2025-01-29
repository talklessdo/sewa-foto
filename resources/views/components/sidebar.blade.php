@php
    $data = DB::table('pakets')->get();
@endphp
@if (auth()->user()->role == 'customer')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
    <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RIS Studio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('admin') }}/img/{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <x-navlink href="/dashboard" :active="request()->is('dashboard')">
                    <i class="nav-icon fas fa-solid fa-table"></i>
                    <p>
                        Dashboard
                    </p>
                </x-navlink>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Paket
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($data as $item)
                  <li class="nav-item">
                    <x-navlink href="/detail/{{ $item->slug }}" :active="request()->is('detail/'.$item->slug)">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $item->name }}</p>
                    </x-navlink>
                  </li>
                      
                  @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    List Booking
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/pending" :active="request()->is('pending')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pending</p>
                    </x-navlink>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/cancel" :active="request()->is('cancel')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cancel</p>
                    </x-navlink>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/approve" :active="request()->is('approve')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approve</p>
                    </x-navlink>
                  </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@else
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
    <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RIS Studio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('admin') }}/img/{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <x-navlink href="/dashboard" :active="request()->is('dashboard')">
                    <i class="nav-icon fas fa-solid fa-table"></i>
                    <p>
                        Dashboard
                    </p>
                </x-navlink>
            </li>
            <li class="nav-item menu-open">
                <x-navlink href="/akun" :active="request()->is('akun')">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Akun
                    </p>
                </x-navlink>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Paket
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($data as $item)
                  <li class="nav-item">
                    <x-navlink href="/detail/{{ $item->slug }}" :active="request()->is('detail/'.$item->slug)">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $item->name }}</p>
                    </x-navlink>
                  </li>
                      
                  @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    List Booking
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/pending" :active="request()->is('pending')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pending</p>
                    </x-navlink>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/cancel" :active="request()->is('cancel')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cancel</p>
                    </x-navlink>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <x-navlink href="/approve" :active="request()->is('approve')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approve</p>
                    </x-navlink>
                  </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
    
@endif