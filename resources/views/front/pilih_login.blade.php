@extends('templates/user')
@section('content')
<!-- ***** Features Big Item Start ***** -->
<div class="background">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <h2>01</h2>
                        <img src="{{ asset('pict/google.png') }}" height="64px" width="64px" alt="">
                        <h4>Login dengan Google</h4>
                        <p>Jika anda ingin login dengan Google, pastikan bahwa anda telah memiliki akun Google.</p>
                        <a href="{{url('login/google')}}" class="main-button">
                            Login Google
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <h2>01</h2>
                        <img src="{{ asset('pict/account.png') }}" height="64px" width="64px" alt="">
                        <h4>Login</h4>
                        <p>Jika anda ingin melakukan login, pastikan bahwa anda telah mendaftarkan akun anda.</p>
                        <a href="{{ route('login') }}" class="main-button">Log in</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <h2>02</h2>
                        <img src="{{ asset('pict/register.png') }}" height="64px" width="64px" alt="">
                        <h4>Register</h4>
                        <p>Membuat akun sistem informasi penerimaan tamu untuk melakukan reservasi</p>
                        <a href="{{ route('register') }}" class="main-button">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="sub-footer">
                <p>Copyright &copy; 2020 Lava Landing Page

                | Designed by <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
            </div>
        </div>
    </div>
</div>
<!-- ***** Features Big Item End ***** -->
@endsection