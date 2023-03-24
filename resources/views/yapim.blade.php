@extends('layouts.master')
@section('title','Yapım Aşamasında')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 text-center">
            {{-- <h1 class="m-0">@yield('title')</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('main')}}">Anasayfa</a></li>
                <li class="breadcrumb-item active"><a href="">Yapım Aşamasında</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        
       <div class="col-md-12  text-center">
        <img src="{{asset('back')}}/dist/img/yapimasamasinda.gif" class="img-fluid" alt="..." width="100%" height="100%">
       </div>
      
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection