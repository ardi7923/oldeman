 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-text mx-2">Oldemen</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}" id="home">
  <a class="nav-link" href="{{ url('admin/dashboard') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

@if(Auth::user()->role == "admin")
<li class="nav-item {{ Request::is('admin/daily') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/daily?date='.now()->format('Y-m-d')) }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Harian</span></a>
</li>

<li class="nav-item {{ Request::is('admin/monthly') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/monthly') }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Bulanan</span></a>
</li>


@endif

<li class="nav-item {{ Request::is('admin/oldemen') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/oldemen') }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Oldemen</span></a>
</li>

@if(Auth::user()->role == "admin")
<li class="nav-item {{ Request::is('admin/rainfall') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/rainfall') }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Curah Hujan</span></a>
</li>

<li class="nav-item {{ Request::is('admin/oldemen-rainfall') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/oldemen-rainfall') }}">
    <i class="fas fa-fw fa-list"></i>
    <span>Oldemen Curah Hujan</span></a>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->