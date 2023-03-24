<div class="row portfolio-item">
    @if(Request::segment(1)=='favgetir')
    @foreach ($news as $new)

    <div class="col-lg-4 col-6 @auth
    @if($favsg->where('fav_id',$new->getNews->id)->first()) fav
    @else {{$new->getNews->tur}}
    @endif
    @else
    {{$new->getNews->tur}}
    @endauth ">
        <div class="bg-white single-portfolio shadow rounded text-center">
            <div class="single-portfolio-img rounded ">
                {{-- <a href="{{ route('getir', $new->id) }}">
                    <img src="{{ $new->logo }}" alt="portfolio" /></a> --}}
                    <a class="gazete-click" gid={{$new->getNews->id}}>
                        <img src="@if($new->getNews->logo!=null) {{asset($new->getNews->logo) }} @else {{ asset('front') }}/assets/img/lifemaris.png @endif" alt="portfolio" /></a>
            </div>
            <div class="portfolio-content mt-1">
                {{-- <a href="{{ route('getir', $new->id) }}" class="">
                    <h5>{{ $new->name }}</h5>
                </a> --}}
                 <div class="row">
                    <div class="@auth col-9 @else col-12 @endauth">
                        <a  class="gazete-click" gid={{$new->id}}>
                            <h5>{{ $new->getNews->name }}</h5>
                        </a>
                    </div>
                    @auth
                    <div class="col-3">
                        <a class="switchsecim"  secim="{{$new->id}}" cat="gazete" uid={{Auth::user()->id}} >
                            <i class="@if($favsg->where('fav_id',$new->id)->first()) fas fa-star text-primary @else far fa-star @endif "></i>
                          </a>

                        {{-- <input class="switchsecim" data-size="small" type="checkbox" secim="{{$new->getNews->id}}" cat="gazete" uid={{Auth::user()->id}} data-on="<i class='fas fa-star text-primary' aria-hidden='true'></i>" data-onstyle="light" data-off="<i class='far fa-star' aria-hidden='true'></i>" data-offstyle=""
                        @if($favsg->where('fav_id',$new->getNews->id)->first()) checked @endif  data-toggle="toggle"> --}}



                    </div>
                    @endauth
                 </div>
            </div>
        </div>
    </div>
@endforeach

    @else
    @foreach ($news as $new)

        <div class="col-lg-4 col-6 @auth
        @if($favsg->where('fav_id',$new->id)->first()) fav
        @else {{$new->tur}}
        @endif
        @else
        {{$new->tur}}
        @endauth ">
            <div class="bg-white single-portfolio shadow rounded text-center">
                <div class="single-portfolio-img rounded ">
                    {{-- <a href="{{ route('getir', $new->id) }}">
                        <img src="{{ $new->logo }}" alt="portfolio" /></a> --}}
                        <a class="gazete-click" gid={{$new->id}}>
                            <img src="@if($new->logo!=null) {{asset($new->logo) }} @else {{ asset('front') }}/assets/img/lifemaris.png @endif" alt="portfolio" /></a>
                </div>
                <div class="portfolio-content mt-1">
                    {{-- <a href="{{ route('getir', $new->id) }}" class="">
                        <h5>{{ $new->name }}</h5>
                    </a> --}}
                     <div class="row">
                        <div class="@auth col-9 @else col-12 @endauth">
                            <a  class="gazete-click" gid={{$new->id}}>
                                <h5>{{ $new->name }}</h5>
                            </a>
                        </div>
                        @auth
                        <div class="col-3">


                            {{-- <input class="switchsecim" data-size="small" type="checkbox" secim="{{$new->id}}" cat="gazete" uid={{Auth::user()->id}} data-on="<i class='fas fa-star text-primary' aria-hidden='true'></i>" data-onstyle="light" data-off="<i class='far fa-star' aria-hidden='true'></i>" data-offstyle=""
                            @if($favsg->where('fav_id',$new->id)->first()) checked @endif  data-toggle="toggle"> --}}
                          <a href="#" class="secim-click"  nid="{{$new->id}}" cat="1" >
                            <i class="@if($favsg->where('fav_id',$new->id)->first()) fas fa-star text-primary @else far fa-star @endif " id="secimicon-{{$new->id}}"></i>
                          </a>


                        </div>
                        @endauth
                     </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif



</div>
