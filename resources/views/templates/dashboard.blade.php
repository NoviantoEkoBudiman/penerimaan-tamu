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
    <link rel="stylesheet" type="text/css" href="{{asset('user_template/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('user_template/assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('user_template/assets/css/templatemo-lava.css')}}">

    <link rel="stylesheet" href="{{asset('user_template/assets/css/owl-carousel.css')}}">

    <!-- FullCalendar -->
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
    
    <script src='{{ asset('fullcalendar/lib/main.js') }}'></script>
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js'></script>
    
    <!-- SweetAlert -->
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
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
                            <img src="{{ asset('pict/logo-penerimaan-tamu.svg')}}" height="100px" width="150px" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        @guest
                            <ul class="nav">
                                <li><a href="{{ url('/') }}" class="menu-item">Beranda</a></li>
                                <li><a href="{{ url('menu') }}" class="menu-item">Reservasi</a></li>
                                <li><a href="{{ route('jadwal.index') }}" class="menu-item">Jadwal Penerimaan</a></li>
                                <li><a href="{{ route('gallery.index') }}" class="menu-item">Galeri</a></li>
                                <li><a href="{{ url('peta') }}" class="menu-item">Peta Balai Kota</a></li>
                                <li><a href="{{ url('pilih_login') }}" class="menu-item">Login</a></li>
                            </ul>
                        @else
                            <ul class="nav">
                                <li><a href="{{ url('/') }}" class="menu-item">Beranda</a></li>
                                <li><a href="{{ url('menu') }}" class="menu-item">Reservasi</a></li>
                                <li><a href="{{ route('jadwal.index') }}" class="menu-item">Jadwal Penerimaan</a></li>
                                <li><a href="{{ route('gallery.index') }}" class="menu-item">Galeri</a></li>
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
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            @if(Session::has('status'))
                <script>
                    Swal.fire({
                        title: "Succes!",
                        text: "Data reservasi telah dikirim!",
                        icon: "success",
                        confirmButtonText: "Tutup"
                    })
                </script>
            @endif
            
            @yield('content')
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- jQuery -->
    <script src="{{ asset('user_template/assets/js/jquery-2.1.0.min.js') }}"></script>

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

</body>
</html>