<div class="row flexbox-center">
    <div class="@if(Request::segment(1) == 'getir') col-lg-12 @else col-lg-7 @endif col-12 text-center text-lg-left ">
        <div class="header-menu row">        
            <nav class="text-center vertical-align-middle vertical-scroll pl-4"
                id="vertical-align-middle"
                style="cursor: default; width:100%!important; height:100px ">
                @php($say=0)
                @foreach ($writers as $writer)

                    <a class="nav-item @if($say%2==0) text-info @else text-secondary @endif yazar-click" 
                        yid="{{ $writer->id }}" style="height:50px; margin-bottom:0px!important;">
                        <span style="font-size:14px; margin-top:0!important;"
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
            </nav>
        </div>
    </div>
    @if(Request::segment(1) == '')
    <div class="col-lg-5 col-12  text-center text-lg-right">
        <div class="portfolio-menu" style="">
            <ul>
               @auth
               @if($favsg!=null and $favsg->count()>0)
                <li data-filter=".fav" class="active">Favorilerim</li>
                <li data-filter="*">Tüm Gazeteler</li>
                @else
                <li data-filter="*" class="active">Tüm Gazeteler</li>
                @endif
               @else
               <li data-filter="*" class="active">Tüm Gazeteler</li>
               @endauth
                
                <li data-filter=".Haber">Haber</li>
                <li data-filter=".Spor">Spor</li>
                <li data-filter=".Ekonomi">Ekonomi</li>
                <li data-filter=".Sosyal">Sosyal</li>
            </ul>
        </div>
    </div>
    @endif
</div>
