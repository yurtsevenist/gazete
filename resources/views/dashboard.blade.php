@extends('layouts.master')
@section('title', 'Tüm Gazeteler')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->

    <section class="content" style="margin-top:0px!important;">
        @if ($gazete != null)
          @include('yazarlar')
          @include('gazete')
        @else
            <!-- portfolio section start -->
            <section class="portfolio-area">
                <div class="container">
                    @include('yazarlar')
                    @include('gazeteler')
                </div>
            </section><!-- portfolio section end -->
        @endif
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
