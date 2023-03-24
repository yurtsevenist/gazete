<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="publisher" content="Laravel 8x ">

    <meta name="Abstract" content="Tüm Gazeteler, Haber, Spor, Sosyal, Eğlence, Ekonomi">
    <meta name="Author" content="Mustafa Yurtseven">
    <meta name="Copyright" content="Copyright © 2023 Tüm Hakları Saklıdır">
    <meta name="description" content="Tüm Gazeteler - Haber - Spor -Medya -Eğlence - Sosyal - Ekonomi">



    <meta property="og:title" content="Tüm Gazeteler">
    <meta property="og:description" content="Tüm Gazeteler - Haber - Spor -Medya -Eğlence - Sosyal - Ekonomi">
    <meta property="og:url" content="http://gazete.ihmtal.com">
    <meta property="og:image" content="/Source/front/assets/img/lifemaris.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="815">
    <meta property="og:image:height" content="815">


    <meta name="twitter:title" content="Tüm Gazeteler">
    <meta name="twitter:description" content="Tüm Gazeteler - Haber - Spor -Medya -Eğlence - Sosyal - Ekonomi">
    <meta name="twitter:url" content="https://gazete.ihmtal.com">
    <meta name="twitter:image" content="/Source/front/assets/img/lifemaris.png">





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/92b0036775.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('front') }}/assets/img/lifemaris.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/assets/css/navbar.css?rnd=132" media="all" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/perfect-scrollbar.css?rnd=132">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/assets/css/style.css?rnd=132" media="all" />
   {{-- back temadan gelenler --}}
    <link rel="stylesheet" href="{{ asset('back') }}/dist/css/adminlte.min.css?rnd=132">

    {{-- back tema end --}}

@yield('css')

</head>
<body class="hold-transition login-page">
  <div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      {{-- <img src="{{asset('back')}}/dist/img/logo3.png" width="50px" alt="">  --}}
     <h5><a target="_blank" href="{{route('main')}}"><b>Tüm </b>Gazeteler</a></h5>
    </div>


