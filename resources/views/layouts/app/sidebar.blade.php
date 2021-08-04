 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-text mx-2">Service</div>
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

<li class="nav-item {{ Request::is('admin/crud-ajax') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/crud-ajax') }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Crud Ajax</span></a>
</li>

<li class="nav-item {{ Request::is('admin/crud-ajax-set') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/crud-ajax-set') }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Crud Ajax Set</span></a>
</li>

<li class="nav-item {{ Request::is('admin/crud-ajax-with-image') ? 'active' : '' }}" id="">
  <a class="nav-link" href="{{ url('admin/crud-ajax-with-image') }}">
    <i class="fas fa-fw fa-school"></i>
    <span>Crud Ajax with image</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->