<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Lava Landing Page HTML Template</title>
<!--

Lava Landing Page

https://templatemo.com/tm-540-lava-landing-page

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user_template/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('user_template/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('user_template/assets/css/templatemo-lava.css') }}">

    <link rel="stylesheet" href="{{ asset('user_template/assets/css/owl-carousel.css') }}">

    <!-- FullCalendar -->
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />

    <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>

    <script src='{{ asset('fullcalendar/lib/locales-all.min.js') }}'></script>
    
    <!-- SweetAlert -->
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('user_template/assets/js/jquery-2.1.0.min.js') }}"></script>
    <link href="{{ asset('datatable/dst/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('datatable/dst/js/jquery.dataTables.min.js') }}"></script>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="{{ asset('flatpickr/flatpickr.min.css') }}">
    <script src="{{ asset('flatpickr/flatpickr.js') }}"></script>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('pict/logo-penerimaan-tamu.svg')}}" height="100px" width="131px" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        
                        @guest
                            <ul class="nav">
                                <li><a href="{{ url('/') }}" class="menu-item">Beranda</a></li>
                                <li><a href="{{ url('menu') }}" class="menu-item">Reservasi</a></li>
                                <li><a href="{{ route('jadwal.index') }}" class="menu-item">Jadwal Penerimaan</a></li>
                                <li><a href="{{ url('peta') }}" class="menu-item">Peta Balai Kota</a></li>
                                <li><a href="{{ url('pilih_login') }}" class="menu-item">Login</a></li>
                            </ul>
                        @else
                            <ul class="nav">
                                <li><a href="{{ url('/') }}" class="menu-item">Beranda</a></li>
                                <li><a href="{{ url('menu') }}" class="menu-item">Reservasi</a></li>
                                <li><a href="{{ route('jadwal.index') }}" class="menu-item">Jadwal Penerimaan</a></li>
                                <li><a href="{{ url('peta') }}" class="menu-item">Peta Balai Kota</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text" style="margin-top: 10%">
            @yield('content')
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- SweetAlert -->

    <script type="javascript" src="https://cdn.jsdelivr.net/npm/@barba/core@2.9.7"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('user_template/assets/js/popper.js') }}"></script>
    <script src="{{ asset('user_template/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('user_template/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('user_template/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('user_template/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('user_template/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('user_template/assets/js/imgfix.min.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('user_template/assets/js/custom.js') }}"></script>

    <!-- Flatpickr -->
    <script>
        $(".flatpickr").flatpickr({
            enableTime: true,
            minDate: "{{ date('Y-m-d') }}",
            "disable": [
                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6 || date.getDay() === 1);
                }
            ],
            "locale": {
                "firstDayOfWeek": 1, // start week on Monday
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
                },
                months: {
                    shorthand: [
                        "Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des",
                    ],
                    longhand: [
                        "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",
                    ],
                },
            },
        });
    </script>

</body>
</html>