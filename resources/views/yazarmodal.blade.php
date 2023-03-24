<div class="modal" id="yazarModal">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header modal-bg text-white">
                <h5 class="modal-title writer-name">
                    Yazar Oku &nbsp; 
                    {{-- <input class="switchyazar" data-size="small" type="checkbox" secimyazar="" catyazar="yazar" uid={{Auth::user()->id}} data-on="<i class='fas fa-star text-primary' aria-hidden='true'></i>" data-onstyle="light" data-off="<i class='far fa-star' aria-hidden='true'></i>" data-offstyle=""
                  @if($favsg->where('fav_id',$->id)->first()) checked @endif
                      data-toggle="toggle">  --}}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark text-white"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="font-size:13px;!important">
                <object data="" id="url" class="responsive-iframe url"></object>
            </div>
        </div>
    </div>
</div>

