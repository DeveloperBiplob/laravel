@extends('layouts.app')

@section('app-content')
<div class="wrapper">

    <!-- Navbar -->
     @includeIf('includes.navbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
      @includeIf('includes.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @includeIf('includes.breadcurmb')
      <!-- /.content-header -->
      @if(session('message'))
      <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>  
    @endif
  
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- All Content goes form here-->
              @yield('master-content')
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!--footer content-->
    @includeIf('includes.footer')
    <!--footer content end-->
    
  </div>
@endsection