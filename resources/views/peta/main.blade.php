@extends('templates/user')
@section('content')
<div class="background">
    <div class="container">
        <div class="row">
            <div class="text-center2" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <h1>Peta Balai Kota</h1>
                <em>Cari Tahu Peta Tempat Pertemuan Pemerintah Kota Yogyakarta</em>
            </div>
            <div id="googleMap" style="width:100%;height:400px;"></div>

            <script>
                function initMap() {
                    var lokasi = {
                        lat: -7.799749,
                        lng: 110.391412
                    };
                    var map = new google.maps.Map(document.getElementById('googleMap'), {
                        zoom: 16,
                        center: lokasi
                    });
                    var marker = new google.maps.Marker({
                        position: lokasi,
                        map: map
                    });
                }
            </script>
            <script src="https://maps.google.com/maps/api/js?key=AIzaSyCqk0o7gAPnf-hWOKtlFPjYtvWBKgDo33o&sensor=false&callback=initMap" type="text/javascript"></script>

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
@endsection