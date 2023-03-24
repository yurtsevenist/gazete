<div class="modal" id="registerModal">
    <div class="modal-dialog modal-md modal-dialog-centered ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header modal-bg text-white">
                <h5 class="modal-title writer-name">
                    Üye Kayıt

                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark text-white"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="font-size:13px;!important">

                {{-- <div class="card"> --}}
                    <div class="card-body register-card-body">
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
                      <form action="{{route('registerPost')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Adınız Soyadınız" required name="name">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <input type="email" class="form-control" placeholder="E-Posta Adresiniz" required name="email">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="Şifreniz" required name="password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" placeholder="Şifre Tekrar" name="password_confirmation" required>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          {{-- <div class="col-8">
                             <div class="icheck-primary">
                              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                              <label for="agreeTerms">
                               I agree to the <a href="#">terms</a>
                              </label>
                            </div>
                          </div> --}}
                          <!-- /.col -->
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>

                   <div class="col-md-12 text-center mt-3">
                    <a href="#" class="text-center login-click">Giriş Sayfasına Dön</a>
                   </div>


                    </div>
                    <!-- /.form-box -->
                  {{-- </div> --}}
                  <!-- /.card -->

            </div>
        </div>
    </div>
</div>

