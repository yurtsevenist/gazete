<div class="row flexbox-center">
     <div class="col-lg-12 col-12  text-center text-lg-right mt-2">
        <div class="portfolio-menu" style="">
            <ul>
               @auth
               @if($favsg!=null and $favsg->count()>0)

                <li data-filter="*" class="active">Tüm Gazeteler</li>
                <li data-filter=".fav" >Favorilerim</li>
                @else
                <li data-filter="*" class="active">Tüm Gazeteler</li>
                @endif
               @else
               <li data-filter="*" class="active">Tüm Gazeteler</li>
               @endauth
                @foreach ($cats as $cat )
                  @if($cat->getMenu->count()>0)
                  <li data-filter=".{{$cat->name}}">{{$cat->name}}</li>
                  @endif
                @endforeach

            </ul>
        </div>
    </div>

</div>
