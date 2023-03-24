  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-danger elevation-3">
    <!-- Brand Logo -->
    <a href="@auth {{route('hesap')}} @else {{route('main')}} @endauth" class="brand-link text-center">
        <b class="brand-text text-center" style="font-size:16px">@auth
            {{Auth::user()->name}}
            @else
            Tüm Gazeteler
        @endauth</b>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->
        <div class="form-inline mt-1">
            <div class="input-group" data-widget="sidebar-search" title="Menü içinde arama yapabilirsiniz!">
                <input class="form-control form-control-sidebar" type="search" placeholder="Gazate Ara" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar"
                        style="width:40px!important;margin-top:0!important;height:38px;margin-bottom:0!important;">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                <li class="nav-item">
                    <a href="{{ route('main') }}" class="nav-link  @if (Request::segment(1) == '') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        {{-- <img class="rounded" src="{{ asset('front') }}/assets/img/lifemaris.png" width="30px"
                            alt="" srcset=""> --}}
                        <p class="fs-6">
                            Tüm Gazeteler
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>


                @auth
                    @if(Auth::user()->who==1)
                    <li class="nav-item">
                        <a href="{{ route('gazeteekle') }}" class="nav-link  @if (Request::segment(1) == 'gazeteekle') active @endif">
                            {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}

                                <i class="nav-icon fa-solid fa-plus"></i>
                            <p class="fs-6">
                                Gazete Ekle

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('yazarekle') }}" class="nav-link  @if (Request::segment(1) == 'yazarekle') active @endif">
                            {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                            <i class=" nav-icon fa-solid fa-feather"></i>

                            <p class="fs-6">
                                Yazar Ekle

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('catekle') }}" class="nav-link  @if (Request::segment(1) == 'catekle') active @endif">
                            {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                            <i class=" nav-icon fa-solid fa-list"></i>

                            <p class="fs-6">
                                Kategori Ekle



                            </p>
                        </a>
                    </li>



                    @endif
                    <li class="nav-item">
                        <a href="{{ route('favgetir') }}" class="nav-link  @if (Request::segment(1) == 'favgetir') active @endif">
                            {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}

                            <i class="nav-icon fa-solid fa-star"></i>
                            <p class="fs-6">
                               Favorilerim
                            </p>
                        </a>
                    </li>
                @endauth
                @foreach ($cats as $cat)
                    {{-- @if(Request::segment(1)=="kurum" or Request::segment(1)=="ogretmen" or Request::segment(1)=="ogrenci" or Request::segment(1)=="ders" or Request::segment(1)=="sinif" )  menu-is-opening menu-open @endif  --}}
                    <li class="nav-item">
                        <a href="{{route('catgetir',$cat->id)}}" class="nav-link @if(Request::segment(2) == $cat->id) active @endif ">
                          <i class="nav-icon  fas fa-angle-right"></i>
                          <p class="fs-6">
                             {{$cat->name}}
                             {{-- <i class="right fas fa-angle-left"></i> --}}
                              <span class="right badge badge-info">{{$cat->getMenu->count()}}</span>
                          </p>
                        </a>

                      </li>
                      @endforeach

                      <li class="nav-item">
                        <a href="#" class="nav-link @if (Request::segment(1) == 'sitekle') active @endif ekle-click" >
                         <i class="nav-icon fa-solid fa-plus"></i>

                        <p class="fs-6">
                            Gazete Ekle
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                       </a>
                    </li>
                @auth
                <li class="nav-item">
                <a href="{{ route('hesap') }}" class="nav-link @if (Request::segment(1) == 'hesap') active @endif" >
                    <i class="nav-icon fa-solid fa-user"></i>
                   <p class="fs-6">
                      Hesabım
                   </p>
               </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" >

                    <i class="nav-icon fa-solid fa-power-off"></i>
                   <p class="fs-6">
                     Oturumu Kapat
                       {{-- <span class="right badge badge-danger">New</span> --}}
                   </p>
               </a>
            </li>
               @else

               <li class="nav-item">
               <a href="#" class="login-click nav-link @if (Request::segment(1) == 'login') active @endif" >
                <i class="nav-icon fa-solid fa-right-to-bracket"></i>

               <p class="fs-6">
                   Üye İşlemleri
                   {{-- <span class="right badge badge-danger">New</span> --}}
               </p>
              </a>
               </li>

                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
