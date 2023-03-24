  <!-- Control Sidebar -->
  <aside class="control-sidebar sidebar control-sidebar-light" style="margin-top:0px!important;">
@include('layouts.rightmenu')
  </aside>
  <!-- /.control-sidebar -->

<footer class="main-footer p-1 ">

    <div class="d-md-none  d-lg-none  d-xl-none row text-center p-0">
        @auth
        <div class="col-2 ">
            <a href="{{route('main')}}" class="btn btn-xs " title="Anasayfa" >
                <i class="fa-solid fa-home fa-2x text-gray"></i>
            </a>
        </div>
        <div class="col-2 ">
            <a href="{{ route('favgetir') }}" class="btn btn-xs " title="Favorilerim" >
                <i class="fa-solid fa-star fa-2x text-gray"></i>
            </a>
        </div>
        <div class="col-2">
            <a href="mailto:info@ihmtal.com" class="btn btn-xs" title="İletişim" >
                <i class="fas fa-envelope fa-2x text-gray"></i>

            </a>
        </div>
        <div class="col-2 ">
            <a href="#" class="btn btn-xs ekle-click" title="Site Ekle" >
                <i class="fa-solid fa-plus fa-2x text-gray"></i>
            </a>
        </div>
        <div class="col-2">
            <a href="#" id="paylas" paylaslogo="{{ asset('front') }}/assets/img/lifemaris.png" class="btn btn-xs" title="Paylaş" >
                <i class="fas fa-share-alt fa-2x fw-bold text-gray"></i>

            </a>
        </div>
        <div class="col-2">
            <a href="{{route('logout')}}" class="btn btn-xs " title="Oturumu Kapat" >
                <i class="fas fa-sign-out-alt fa-2x text-gray"></i>
            </a>
        </div>
        @else
        <div class="col-2 ">
            <a href="{{route('main')}}" class="btn btn-xs " title="Anasayfa" >
                <i class="fa-solid fa-home fa-2x text-gray"></i>
            </a>
        </div>
        <div class="col-2">
            <a href="mailto:info@ihmtal.com" class="btn btn-xs" title="İletişim" >
                <i class="fas fa-envelope fa-2x text-gray"></i>

            </a>
        </div>
            <div class="col-4 ">
                <a href="#" class="btn btn-xs ekle-click" title="Site Ekle" >
                    <i class="fa-solid fa-plus fa-2x text-gray"></i>
                </a>
            </div>
            <div class="col-2">
                <a href="#" id="paylas" paylaslogo="{{ asset('front') }}/assets/img/lifemaris.png" class="btn btn-xs" title="Paylaş" >
                    <i class="fas fa-share-alt fa-2x fw-bold text-gray"></i>

                </a>
            </div>

            <div class="col-2 ">
                <a href="#" class="btn btn-xs login-click " title="Oturum Aç" >
                 <i class="fas fa-sign-in-alt fa-2x text-gray"></i>
             </a>
            </div>
        @endauth
     </div>
    <div class="float-right d-none d-sm-inline-block">
      <b style="font-size:12px;">Sürüm:</b> <span style="font-size:12px;">1.1.0</span>
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<a id="back-to-top" href="#" title="Sayfanın üst kısmına gider" class="btn btn-outline-secondary btn-md back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
@include('loginmodal')
@include('registermodal')
@include('forgetmodal')
@include('siteekle')
@include('yazarmodal')
@include('gazetemodal')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('front')}}/assets/js/perfect-scrollbar.min.js"></script>


<script src="{{asset('front')}}/assets/js/jquery.slicknav.min.js"></script>
<!-- owl carousel JS -->
<script src="{{asset('front')}}/assets/js/owl.carousel.min.js"></script>
<!-- Popup JS -->
<script src="{{asset('front')}}/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Isotope JS -->
<script src="{{asset('front')}}/assets/js/isotope.pkgd.min.js"></script>
<!-- main JS -->
<script src="{{asset('front')}}/assets/js/main.js"></script>

{{-- <!-- AdminLTE for demo purposes -->
<script src="{{asset('back')}}/dist/js/demo.js"></script> --}}
{{-- back tema start --}}
<!-- AdminLTE App -->
<script src="{{asset('back')}}/dist/js/adminlte.js"></script>
{{-- back tema end --}}
<script>
    $(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
        } else {
        $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
        scrollTop: 0
        }, 400);
        return false;
    });
    });
    </script>

        <script>
        const paylasButon = document.getElementById("paylas");
        paylasButon.addEventListener("click", async () =>{

            if (navigator.canShare) {

                try {
                    //paylaşma özelliği
                    await navigator.share({
                        title:"Tüm Gazeteler",
                        text:"Bütün Gazeteler, köşe yazarları kolay ve hızlı bir şekilde okumanız için bu sitede.",
                        url:"https://gazete2.ihmtal.com" //window.location.href mevcut url
                    })
                    console.log("Paylaş çalıştı")
                } catch (error) {
                    console.log("Bir sorun oldu")
                }

            } else {
                Console.log("Tarayıcı desteklemiyor")
            }
        });

        </script>
   @yield('js')
    {{-- @toastr_js
   @toastr_render  --}}
 {{-- sağ menü arama --}}
 <script>
  function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
  </script>
@include('scripts')
 {{-- sağ menu arama sonu --}}
</body>
</html>
