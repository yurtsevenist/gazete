<script>
    $(function() {
        $('.ekle-click').click(function() {
            $('#ekleModal').modal('show');
        });
    })
</script>
<script>
    $(function() {
        $('.login-click').click(function() {
            $('#forgetModal').modal('hide');
            $('#registerModal').modal('hide');
            $('#loginModal').modal('show');
        });
    })
</script>
<script>
    $(function() {
        $('.register-click').click(function() {
            $('#loginModal').modal('hide');
            $('#forgetModal').modal('hide');
            $('#registerModal').modal('show');


        });
    })
</script>
<script>
    $(function() {
        $('.forget-click').click(function() {
            $('#loginModal').modal('hide');
            $('#registerModal').modal('hide');
            $('#forgetModal').modal('show');
        });
    })
</script>
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
                        // console.log(data);
                        $('#id').val(data.id);
                        $("#writer-photo").attr("src", data.img);
                        $("#url").attr("data", data.url);
                        $("#switchsecim").attr("secimyayazar", data.id);
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
             console.log(id);
            $.ajax({
                type: 'GET',
                url: '{{ route('gazeteGet') }}',
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data);
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
<script>
    $(function() {
        $('.secim-click').click(function() {
            id = $(this)[0].getAttribute('nid');
            cat = $(this)[0].getAttribute('cat');


            $.ajax({
                type: 'GET',
                url: '{{ route('favorite')}}',
                data: {
                    id: id,
                    cat:cat
                },
                success: function(data) {
                     $icon="#secimicon-"+id;
                    $($icon).attr("class","fas fa-star" );

                }
            })

        });
    })
</script>
<script>
    $(function() {
        $('.yazarsecim-click').click(function() {
            id = $(this)[0].getAttribute('yid');
            cat = $(this)[0].getAttribute('ycat');


            $.ajax({
                type: 'GET',
                url: '{{ route('favorite')}}',
                data: {
                    id: id,
                    cat:cat
                },
                success: function(data) {
                     $icon="#secimicony-"+id;
                    $($icon).attr("class","fas fa-star" );

                }
            })

        });
    })
</script>
<script>
    $(function() {
        $('.yazarfavkaldir-click').click(function() {
            id = $(this)[0].getAttribute('yid');
            cat = $(this)[0].getAttribute('ycat');


            $.ajax({
                type: 'GET',
                url: '{{ route('favorite')}}',
                data: {
                    id: id,
                    cat:cat
                },
                success: function(data) {
                     $icon="#secimicony-"+id;
                    $($icon).attr("class","far fa-star" );

                }
            })

        });
    })
</script>
{{-- <script>

    $('.switchsecim').change(function() {
   id = $(this)[0].getAttribute('secim');
   cat = $(this)[0].getAttribute('cat');
   statu=$(this).prop('checked');
   uid=$(this)[0].getAttribute('uid');
   $.get("{{route('favorite')}}", {id:id,statu:statu,cat:cat,uid:uid}, function(data,status,cat,uid){

   });
 })
</script>
<script>

    $('.switchyazar').change(function() {
   id = $(this)[0].getAttribute('secimyazar');
   cat = $(this)[0].getAttribute('catyazar');
   statu=$(this).prop('checked');
   uid=$(this)[0].getAttribute('uid');
   $.get("{{route('favorite')}}", {id:id,statu:statu,cat:cat,uid:uid}, function(data,status,cat,uid){

   });
 })
</script> --}}
