
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="token" content="{{ csrf_token() }}">
  <link rel="icon" href="">
  <title>@yield('title_page')</title>

  @include('layouts.app.styles')
  @yield('styles_page')
  @yield('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('layouts.app.sidebar')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('layouts.app.header')

        <!-- Begin Page Content -->
        <div class="container-fluid">


          @yield('content')
          <!-- Content Row -->

      <!-- End of Main Content -->
      @include('layouts.app.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  @include('layouts.app.scripts')

  @yield('scripts_page')
  @yield('js')
  
</body>

</html>
