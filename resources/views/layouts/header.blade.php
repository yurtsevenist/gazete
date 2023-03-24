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
    <meta name="description" content="Tüm Gazeteler - Haber - Spor -Medya -Eğlence - Sosyal - Ekonomi-Günlük Gazate-Günlük Köşe Yazıları">



    <meta property="og:title" content="Tüm Gazeteler">
    <meta property="og:description" content="Tüm Gazeteler - Haber - Spor -Medya -Eğlence - Sosyal - Ekonomi-Günlük Gazate-Günlük Köşe Yazıları">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/assets/css/navbar.css" media="all" />
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/assets/css/style.css" media="all" />
   {{-- back temadan gelenler --}}
    <link rel="stylesheet" href="{{ asset('back') }}/dist/css/adminlte.min.css">

    {{-- back tema end --}}
    <style>
        .back-to-top {
            position: fixed;
            bottom: 45px;
            right: 45px;
            display: none;
        }
    </style>

@yield('css')
 {{-- @toastr_css  --}}
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    	<!-- Page loader -->

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item" title="Gazeteler Menüsü">
                    <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars fa-2x"></i></a>
                </li>

              </ul>
              <ul class="navbar-nav ml-auto mr-0">
                <li class="nav-item header-menu">

                    <nav class="text-center vertical-align-middle vertical-scroll" id="vertical-align-middle"
                   style="cursor: default;">
                       @php($say=0)
                        @if(Request::segment(1)=='favgetir')
                        @foreach ($writers as $writer)
                        <a class="nav-item @if($say%2==0) text-info @else text-secondary @endif yazar-click"
                            yid="{{ $writer->getWriters->id }}" style="height:50px; margin-bottom:0px!important;">
                             <span style="font-size:12px; margin-top:0!important;"
                                class="portfolio-content">{{ $writer->getWriters->name }}</span>
                            <div class="story single-portfolio-img">
                                <img src="{{asset($writer->getWriters->img) }}" alt="">
                                <svg viewbox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" />
                                </svg>
                            </div>
                        </a>
                        @php($say++)
                    @endforeach
                        @else
                        @foreach ($writers as $writer)
                        <a class="nav-item @if($say%2==0) text-info @else text-secondary @endif yazar-click"
                            yid="{{ $writer->id }}" style="height:50px; margin-bottom:0px!important;">
                             <span style="font-size:12px; margin-top:0!important;"
                                class="portfolio-content">{{ $writer->name }}</span>
                            <div class="story single-portfolio-img">
                                <img src="{{asset($writer->img) }}" alt="">
                                <svg viewbox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" />
                                </svg>
                            </div>
                        </a>
                        @php($say++)
                    @endforeach
                        @endif
                   </nav>

             </li>
              </ul>
              <ul class="navbar-nav ml-auto mr-0">
                            <li class="nav-item mt-0" title="Yazarlar Menüsü">
                  <a class="nav-link "  style="height:45px;" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fa-sharp fa-solid fa-feather fa-2x"></i>
                  </a>
                </li>
              </ul>

        </nav>






    <!-- /.navbar -->
