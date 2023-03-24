@extends('layouts.master')
@section('title','Yazar Ekle')
@section('content')
<div class="content-wrapper">
    <section class="content" style="margin-top:100px!important;">
    <div class="card col-md-12">
                 <div class="card-header py-3 text-center">
                   <h4 class="m-0 font-weight-bold text-primary">@yield('title')</h4>
                 </div>
                  <div class="card-body">
                   @if ($errors->any())
                   <div class="alert alert-danger" role="alert">
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </div>

               @endif
               @if (Session::has('fail'))
                   <div class="alert alert-danger" role="alert">
                       {{ Session::get('fail') }}
                   </div>
               @endif
               @if (Session::has('success'))
                   <div class="alert alert-success" role="alert">
                       {{ Session::get('success') }}
                   </div>
               @endif
                   <form action="{{ route('dosyaUpload') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <input type="hidden" name="yid" id="yid" value="">
                        <div class="form-group col-md-2">

                            <label for="title">Yazar Adı</label>
                             <input class="form-control " type="text" id="name" name="name"  required>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="tur">Gazete</label>
                            <select class="custom-select mr-sm-2" id="news" name="news">
                                <option value="">Seçiniz</option>
                                 @foreach ($news as $new )
                                 <option value="{{$new->id}}">{{$new->name}}</option>
                                 @endforeach
                             </select>
                             </div>
                          <div class="form-group col-md-2">
                            <label for="title">Url</label>
                             <input class="form-control " type="text" id="url" name="url" required>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="tur">Kategori</label>
                            <select class="form-control" id="tur" name="tur">
                                <option value="">Kategori Seçiniz</option>
                                @foreach ($cats as $cat )
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                             {{-- <div class="form-group col-md-2">
                                <label for="title">Popularite</label>
                                 <input class="form-control" type="number" id="pop" name="pop"  min="1" max="100" value="0" >
                              </div> --}}
                           <div class="form-group col-md-4">
                             <label for="title">Fotoğraf</label>
                                <input class="form-control" type="file" name="img" id="img" required>
                           </div>
                     </div>

                     <button type="submit" class=" btn btn-block btn-outline-primary">Kaydet</button>

                 </form>
                  </div>



                   </div>
                   <div class="card">
                    <div class="card-header">
                      <h3 class="card-title text-info fw-bold fs-4">Kurumunuzda Kayıtlı Öğretmen Listesi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sıra No</th>
                          <th>Resim</th>
                          <th>Yazar Adı</th>
                          <th>Slug</th>
                          <th>Gazete</th>
                          <th>Url</th>
                          <th>Kategori</th>
                         <th>Popülarite</th>
                         <th style="width:80px !important">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                          @php($sira=0)
                          @foreach($writers as $new)
                          @php($sira++)
                          <tr>
                           <td>{{$sira}}</td>
                          <td>
                            <img class="rounded" src="{{ asset($new->img)}}" width="30px"
                            alt="" srcset="">
                          </td>
                            <td>{{$new->name}}</td>
                            <td>{{$new->slug}}</td>
                            <td>{{$new->news}}</td>


                            <td>{{$new->url}}</td>

                            <td>{{$new->getCat->name}}</td>
                            <td>{{$new->pop}}</td>
                            {{-- {!!-!!} işaretleri konulduğunda içindeki veriyi html olarak düzenliyor --}}
                            <td style="width:80px !important">
                            <a id="{{$new->id}}" title="Düzenle" class="btn btn-sm btn-outline-primary edit-click" id="edit-click"><i class="fas fa-pencil-alt"></i></a>
                            <a title="Sil" class="btn btn-sm btn-outline-danger delete-click mt-1"
                            id="{{ $new->id }}"><i class="fas fa-trash-alt"></i></a>
                            </td>                        </td>
                          </tr>


                          @endforeach

                        </tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
    </section>
</div>
<div class="modal" id="deleteModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Yazar Sil</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body" id="body">

                <p>Seçmiş olduğunuz yazar silinecektir, Onaylıyormusunuz?</p>

            </div>


            <div class="modal-footer">
                <form method="POST" action="{{ route('yazarDelete') }}">
                    @csrf
                    <input type="hidden" name="id" id="delete_id" />
                    <button id="deleteBtn" type="submit" class="btn btn-primary">Sil</button>
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
            </div>


        </div>


    </div>
</div>
@endsection
@section('js')

@include('table')
<script>
    $(function() {
        $('.delete-click').click(function() {
            id = $(this)[0].getAttribute('id');

            $('#delete_id').val(id);
            $('#deleteModal').modal('show');

        });
    });
</script>
<script>
    $(function () {
          $('.edit-click').click(function(){
          id = $(this)[0].getAttribute('id');
          $.ajax({
             type: 'GET',
                   url: '{{route('yazarGet')}}',
                   data: {
                       id: id
                   },
                   success:function(data)
                   {
                    //  console.log(data);
                            $('#gid').val(data.id);
                            $('#name').val(data.name);
                            $('#news').val(data.news_id);
                            $('#tur').val(data.cat_id);
                            $('#url').val(data.url);

                  }
           });
           $('#editModal').modal('show');

       });
   });
      </script>
@endsection
@section('css')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('back')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
