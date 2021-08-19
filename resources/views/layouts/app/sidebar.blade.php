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

<li class="nav-item {{ Request::is('admin/daily') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/daily?date='.now()->format('Y-m-d')) }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Harian</span></a>
</li>

<li class="nav-item {{ Request::is('admin/monthly') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/monthly') }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Bulanan</span></a>
</li>

<li class="nav-item {{ Request::is('admin/oldemen') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/oldemen') }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Oldemen</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->