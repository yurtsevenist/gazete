<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tüm Gazeteler</title>
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/92b0036775.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="{{ asset('front') }}/assets/img/lifemaris.png" type="image/x-icon"> 
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
    <p><b>Tüm </b>Gazeteler</p> 
    </div>

    <div class="container h-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">E-Posta Adresinizi Doğrulayın</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                       </div>
                   @endif
                  
                  {{-- <a href="https://www.domain.com/{{$token}}/reset-password">Şifrenizi değiştirmek için tıklayın</a> --}}
                    <a href="http://127.0.0.1:8000/{{$token}}/reset-password">Şifrenizi Sıfırlamak için Tıklayın</a> 
               </div>
           </div>
       </div>
   </div>
</div>
<!-- jQuery -->
<script src="{{asset('back')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('back')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('back')}}/dist/js/adminlte.min.js"></script>
</body>
</html>

