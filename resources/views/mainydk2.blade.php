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
        @include('yazarmodal')
        @include('gazetemodal')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection
@section('js')
    <script>
        $(function() {
            $('.yazar-click').click(function() {
                id = $(this)[0].getAttribute('yid');
                // console.log(id);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('yazarGet') }}',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#id').val(data.id);
                        $("#writer-photo").attr("src", data.img);
                        $("#url").attr("data", data.url);
                        $("#switchsecim").attr("secim", data.id);
                        //  $('#name').val(data.name);
                        $(".writer-name").text("Yazar : " + data.name);
                    }
                })
                $('#yazarModal').modal('show');
            });
        })
    </script>
   <script>
    $(function() {
        $('.gazete-click').click(function() {
            id = $(this)[0].getAttribute('gid');
            // console.log(id);
            $.ajax({
                type: 'GET',
                url: '{{ route('gazeteGet') }}',
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data);
                    $('#gid').val(data.id);
                    $("#gazete-photo").attr("src", data.logo);
                    $("#gurl").attr("data", data.url);
                    
                    //  $('#name').val(data.name);
                    $(".gazete-name").text("Gazete : " + data.name);
                }
            })
            $('#gazeteModal').modal('show');
        });
    })
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>

    $('.switchsecim').change(function() {
   id = $(this)[0].getAttribute('secim');
   cat = $(this)[0].getAttribute('cat');
   statu=$(this).prop('checked');
   uid=$(this)[0].getAttribute('uid');
   $.get("{{route('favorite')}}", {id:id,statu:statu,cat:cat,uid:uid}, function(data,status,cat,uid){
     //  console.log(data);
   });
 })
</script>
@endsection
