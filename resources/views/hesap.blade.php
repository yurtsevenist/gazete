@extends('layouts.master')
@section('title','Hesap Ayarları')
@section('content')
<div class="content-wrapper"> 
  <!-- Main content -->
  <section class="content">
    <div class="row">
  
        <div class="col-md-8 offset-md-2 col-12 mt-5">
          <div class="card card-primary card-outline card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item "><a class="nav-link active bg-white border"  data-toggle="tab">Kullanıcı Bilgileri</a></li>             
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" method="POST" action="{{route('profil')}}" enctype="multipart/form-data">
                      @csrf
                      @if ($errors->any())
                      <div class="alert alert-danger" role="alert">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </div>
                    @endif
                   
                  @if (Session::has('fail'))
                      <div class="alert alert-danger" role="alert">
                          {{ Session::get('fail') }}
                      </div>
                  @endif
                  @if (Session::has('success'))
                      <div class="alert alert-success" role="alert">
                          {{ Session::get('success') }}
                      </div>                
                  @endif
                      <div class="input-group mb-3">
                        <input type="hidden" name="id" id="uye_id" value="" >
                        <input placeholder="Adı Soyadı" id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus value="{{ Auth::user()->name }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-user"></span>
                            </div>
                          </div>
                    
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="E-Posta Adresi" id="email" type="email" class="form-control" name="email"  required autocomplete="email" value={{Auth::user()->email}}>
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-envelope"></span>
                            </div>
                          </div>                       

                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Şifre" id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-lock"></span>
                            </div>
                          </div>
                    
                    </div>


                    <div class="input-group mb-3">
                        <input placeholder="Şifre Tekrar" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fa fa-lock"></span>
                            </div>
                          </div>
                    </div>


                      <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                      </div>

                  </form>
                </div>
                <!-- /.tab-pane -->
               
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
  </section>
  <!-- /.content -->
</div>
@endsection

