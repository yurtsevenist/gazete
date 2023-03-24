@extends('layouts.master')
@section('title', 'Tüm Gazeteler')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->

        <section class="content" style="margin-top:90px!important;">

                <section class="portfolio-area">
                    <div class="container">
                        @include('yazarlar')
                        @include('gazeteler')
                    </div>
                </section><!-- portfolio section end -->

        </section>
     
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('css')


@endsection
@section('js')

@endsection
