
     <!-- SidebarSearch Form -->
     <div class="form-inline m-1">
        <div class="input-group">

                <input type="text" class="form-control text-dark" id="mySearch" onkeyup="myFunction()" placeholder="Yazar Ara" title="Yazar isimlerini yazarak arama yapabilirsiniz.">


        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
         data-accordion="false" id="myMenu">

         @if(Request::segment(1)=='favgetir')
         @foreach ($writers as $writer)

         <li class="nav-item">
            <div class="row">
                <div class="col-9">
             <a  class="nav-link yazar-click"  yid="{{ $writer->getWriters->id }}">
                 <img class="rounded-circle" src="@if($writer->getWriters->img!=null) {{asset($writer->getWriters->img)}} @else {{asset('front')}}/assets/img/lifemaris.png  @endif " width="30px" alt=""
                 srcset="">
             <p>&nbsp; {{$writer->getWriters->name}}</p>
             </a>
                </div>
                <div class="col-3 text-center">
                    <a class="yazarfavkaldir-click nav-link mt-1" href="#" yid="{{$writer->getWriters->id}}" ycat="0">
                        <i class="@if($favsw->where('fav_id',$writer->getWriters->id)->first()) fas fa-star @else far fa-star @endif " id="secimicony-{{$writer->getWriters->id}}"></i>
                     </a>
                </div>
            </div>
         </li>
        @endforeach
         @else
         @foreach ($writers as $writer)

         <li class="nav-item">
            @auth
            <div class="row">
                <div class="col-9">
                    <a  class="nav-link yazar-click"  yid="{{ $writer->id }}">
                        <img class="rounded-circle" src="@if($writer->img!=null) {{asset($writer->img)}} @else {{asset('front')}}/assets/img/lifemaris.png  @endif " width="30px" alt=""
                        srcset="">
                    <p>&nbsp; {{$writer->name}}</p>
                    </a>

                </div>
                <div class="col-3 text-center">
                    <a class="yazarsecim-click nav-link mt-1" href="#" yid="{{$writer->id}}" ycat="0">
                        <i class="@if($favsw->where('fav_id',$writer->id)->first()) fas fa-star @else far fa-star @endif " id="secimicony-{{$writer->id}}"></i>
                     </a>
                </div>
            </div>
            @else

                <a  class="nav-link yazar-click"  yid="{{ $writer->id }}">
                    <img class="rounded-circle" src="@if($writer->img!=null) {{asset($writer->img)}} @else {{asset('front')}}/assets/img/lifemaris.png  @endif " width="30px" alt=""
                    srcset="">
                <p>&nbsp; {{$writer->name}}</p>
                </a>


            @endauth
         </li>
        @endforeach
         @endif

         @if($writers->count()<2)
         <li class="nav-item">
            <p><h5>&nbsp;</h5></p>
        </li>
        <li class="nav-item">
            <p><h5>&nbsp;</h5></p>
        </li>
         @endif



      </ul>
 </nav>
 <!-- /.sidebar-menu -->
