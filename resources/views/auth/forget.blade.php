@extends('auth.master')
@section('content')
<div class="card">
    <div class="card-body login-card-body">
      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </div>
    @else
    <p class="login-box-msg">Şifre sıfırlama linkiniz sistemde kayıtlı olan E-Posta adresinize gönderilecektir.</p>
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
      <form action="{{route('postEmail')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-Posta" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Şifre Sıfırlama Linki Gönder</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{url('/login')}}">Üye Giriş Sayfası</a>
      </p>
      <p class="mb-0">
        <a href="{{url('register')}}" class="text-center">Üye Kayıt Sayfası</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection