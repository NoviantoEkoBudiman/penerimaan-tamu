@extends('templates/user')
@section('content')
<div class="container">
    <div class="row">
        <div data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <h1 class="text-center"><em>Reservasi</em></h1>
        </div>
        <!-- ***** Features Big Item Start ***** -->
        <section class="section" id="promotion">
            <div class="container">
                <div class="row">
                    <div class="left-image col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix-big"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <img src="{{ asset('user_template/assets/images/left-image.png') }}" class="rounded img-fluid d-block mx-auto" alt="App">
                    </div>
                    <div class="right-text offset-lg-1 col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix">
                        <form action="">
                            <table class="table-borderless text-left">
                                <tr>
                                    <td>
                                        <div class="alert alert-primary" role="alert">
                                            Data Pemohon
                                        </div>
                                    </td>
                                <tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                        <div class="text">
                                            <h4>Nama:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Nama Instansi Pemohon:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Nomor HP (dapat menerima panggilan):</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>WA (boleh sama dengan nomor HP):</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Provinsi:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Alamat instansi</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="alert alert-primary" role="alert">
                                            Data Tujuan Reservasi
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                        <div class="text">
                                            <h4>Hari & Pukul Kunjungan:</h4>
                                            <input type="date" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Topik diskusi (terangkan dengan jelas):</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Lokus/tujuan OPD yang akan dikunjungi:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Jumlah rombongan:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Rencana Pimpinan Rombongan:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Keterangan</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="alert alert-primary" role="alert">
                                            Data Surat Permohonan Kunjungan
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                        <div class="text">
                                            <h4>No. Surat:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Kepada:</h4>
                                            <input type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Surat Permohonan Kunjungan :</h4>
                                            <input type="file" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <button type="submit" class="btn btn-md btn-primary" style="float: left">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->
    </div>
</div>
@endsection