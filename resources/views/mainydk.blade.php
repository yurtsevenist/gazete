@extends('layouts.master')
@section('title', 'Tüm Gazeteler')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        @if (Request::segment(1) == 'getir')
            <div class="row flexbox-center mb-1">
                <div class="col-lg-12 col-12 text-center ">


                    <div class="header-menu row">
                        <nav class="text-center vertical-align-middle vertical-scroll" id="vertical-align-middle"
                            style="cursor: default; width:100%!important; height:100px ">

                            @foreach ($writers->where('news_id') as $writer)
                                <a class="nav-item text-info text-center yazar-click" href="#" yid="{{ $writer->id }}"
                                    style="height:50px; margin-bottom:0px!important;">
                                    <span style="font-size:14px; margin-top:0!important;"
                                        class="portfolio-content">{{ $writer->name }}</span>
                                    <div class="story single-portfolio-img">
                                        <img src="{{ asset($writer->img) }}" alt="">
                                        <svg viewbox="0 0 100 100">
                                            <circle cx="50" cy="50" r="40" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </nav>
                    </div>


                </div>
            </div>
        @endif
        <section class="content" style="margin-top:0px!important;">
            @if ($gazete != null)
                <div class="icerik">
                    {{-- <embed type="text/html" src="{{$gazete->url}}" class="responsive-iframe"/>  --}}
                    <object data="{{ $gazete->url }}" class="responsive-iframe"></object>
                </div>
            @else
                <!-- portfolio section start -->
                <section class="portfolio-area">
                    <div class="container">

                        <div class="row flexbox-center">
                            <div class="col-lg-7 col-12 text-center text-lg-left ">


                                <div class="header-menu row">



                                    <nav class="text-center vertical-align-middle vertical-scroll pl-4"
                                        id="vertical-align-middle"
                                        style="cursor: default; width:100%!important; height:100px ">

                                        @foreach ($writers as $writer)
                                            <a class="nav-item text-info yazar-click" href="#"
                                                yid="{{ $writer->id }}" style="height:50px; margin-bottom:0px!important;">
                                                <span style="font-size:14px; margin-top:0!important;"
                                                    class="portfolio-content">{{ $writer->name }}</span>
                                                <div class="story single-portfolio-img">
                                                    <img src="{{ $writer->img }}" alt="">
                                                    <svg viewbox="0 0 100 100">
                                                        <circle cx="50" cy="50" r="40" />
                                                    </svg>
                                                </div>





                                            </a>
                                        @endforeach



                                    </nav>
                                </div>


                            </div>






                            <div class="col-lg-5 col-12  text-center text-lg-right">
                                <div class="portfolio-menu" style="">
                                    <ul>
                                        <li data-filter="*" class="active">Tüm Gazeteler</li>
                                        <li data-filter=".haber">Haber</li>
                                        <li data-filter=".spor">Spor</li>
                                        <li data-filter=".ekonomi">Ekonomi</li>
                                        <li data-filter=".sosyal">Sosyal</li>
                                    </ul>
                                </div>
                            </div>

                        </div>




                        <div class="row portfolio-item">

                            @foreach ($news as $new)
                                <div class="col-lg-4 col-6 {{ $new->tur }}">

                                    <div class="bg-white single-portfolio shadow rounded text-center">
                                        <div class="single-portfolio-img rounded ">
                                            <a href="{{ route('getir', $new->id) }}">
                                                <img src="{{ $new->logo }}" alt="portfolio" /></a>

                                        </div>

                                        <div class="portfolio-content mt-1">
                                            <a href="{{ route('getir', $new->id) }}" class="">
                                                <h5>{{ $new->name }}</h5>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </section><!-- portfolio section end -->




            @endif

        </section>
        @include('yazarmodal')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('css')

@endsection
@section('js')

    <script>
        $(function() {
            $('.yazar-click').click(function() {

                id = $(this)[0].getAttribute('yid');
                console.log(id);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('yazarGet') }}',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $("#writer-photo").attr("src", data.img);
                        $("#url").attr("data", data.url);

                        //  $('#name').val(data.name);
                        $(".writer-name").text("Yazar : " + data.name);
                    }


                })

                $('#yazarModal').modal('show');
            });
        })
    </script>
@endsection
