@extends('templates/user')
@section('content')
<!-- ***** Features Big Item Start ***** -->
<div class="background">
    <div class="container">
        <div class="row">
            @if(Auth::user())
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item white">
                        <div class="features-icon">
                            <h2>01</h2>
                            <img src="{{ asset('pict/reservation.png') }}" height="72px" width="72px" alt="">
                            <br/>
                            <br/>
                            <a href="{{ route('tatacara.index') }}" class="main-button">
                                Lakukan Reservasi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item white">
                        <div class="features-icon">
                            <h2>02</h2>
                            <img src="{{ asset('pict/register.png') }}" height="72px" width="72px" alt="">
                            <br/>
                            <br/>
                            <a href="{{ route('riwayat') }}" class="main-button">
                                Riwayat Reservasi
                            </a>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item white">
                        <div class="features-icon">
                            <h2>01</h2>
                            <img src="{{ asset('pict/door.png') }}" height="72px" width="72px" alt="">
                            <br/>
                            Silahkan login terlebih dahulu
                            <br/>
                            <a href="{{ route('login') }}" class="main-button">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            @endif
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