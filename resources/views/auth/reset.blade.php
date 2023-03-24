@extends('auth.master')
@section('content')

  
    <div class="card">
      <div class="card-body register-card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
      @else
      <p class="login-box-msg">Şifrenizi değiştirebilirsiniz.</p>
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
        <form action="{{route('updatePassword')}}" method="post">
                 @csrf
                 <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="E-Posta Adresiniz" required name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Şifreniz" required name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Şifre Tekrar" name="password_confirmation" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            {{-- <div class="col-8">
               <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div> 
            </div> --}}
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
     
  
       
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection