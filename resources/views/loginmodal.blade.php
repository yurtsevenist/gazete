<div class="modal" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-md ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header modal-bg text-white">
                <h5 class="modal-title writer-name">
                    Üye Giriş
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark text-white"></i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="font-size:13px;!important">

                @php
                if (isset($_COOKIE['loginemail']) && isset($_COOKIE['loginpassword'])) {
                    $email = $_COOKIE['loginemail'];
                    $password = $_COOKIE['loginpassword'];
                    if(Auth::attempt(['email'=>$email,'password'=>$password])){
                        setcookie('loginemail',$email,time()+60*60*24*365);
                        setcookie('loginpassword',$password,time()+60*60*24*365);
                        @endphp
                        <script>
                            window.location.href = "/dashboard";
                        </script>
                        @php
                    }
                }
            @endphp
                <!-- /.login-logo -->

                    <div class="card-body login-card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                          @else
                          <p class="login-box-msg">Oturum açmak için giriş yapınız</p>
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
                        <form action="{{route('loginPost')}}" method="post">
                          @csrf
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="E-Posta" name="email" value="{{old('email')}}" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Şifre" name="password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">
                                            Beni Hatırla
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Giriş</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                      <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                      <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                  </div> --}}
                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                            <a class="forget-click" href="#">Şifremi Unuttum</a>
                        </p>
                        <p class="mb-0">
                            <a class="register-click" href="#" class="text-center">Yeni Üye</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>

                <!-- /.login-box -->

            </div>
        </div>
    </div>
</div>

