<div class="modal" id="ekleModal">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header modal-bg text-white">
                <h5 class="modal-title writer-name">
                    Gazete Ekle
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark text-white"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="font-size:13px;!important">


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
                        <form action="{{route('gazeteUpload')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="title">Gazete Adı</label>
                                    <input class="form-control " type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">Url</label>
                                    <input class="form-control " type="text" id="url" name="url" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="tur">Kategori</label>
                                    <select class="form-control" id="tur" name="tur">
                                        <option value="">Kategori Seçiniz</option>
                                        @foreach ($cats as $cat )
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">Fotoğraf</label>
                                    <input class="form-control" type="file" name="img" id="img">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-block  btn-outline-primary">Kaydet</button>

                        </form>
                    </div>



                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

