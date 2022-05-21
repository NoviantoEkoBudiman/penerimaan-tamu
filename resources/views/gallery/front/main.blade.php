@extends('templates/user')
@section('content')
<!-- ***** Features Big Item Start ***** -->
<div class="background">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <img src="{{ asset('pict/photo.jpg') }}" height="240px" width="240px" alt="">
                        <p>Kunjungan kerja ke PT. XXX dalam rangka peningkatan mutu kualitas perusahaan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <img src="{{ asset('pict/photo.jpg') }}" height="240px" width="240px" alt="">
                        <p>Kunjungan kerja ke PT. XXX dalam rangka peningkatan mutu kualitas perusahaan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                <div class="features-item white">
                    <div class="features-icon">
                        <img src="{{ asset('pict/photo.jpg') }}" height="240px" width="240px" alt="">
                        <p>Kunjungan kerja ke PT. XXX dalam rangka peningkatan mutu kualitas perusahaan</p>
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
</div>
<!-- ***** Features Big Item End ***** -->
@endsection