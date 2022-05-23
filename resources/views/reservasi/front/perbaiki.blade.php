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
                        <form method="POST" action=" {{ route('reservasi.update',$data->id_reservasi) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <table class="table-borderless text-left">
                                @if ($errors->any())
                                    <script>
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Ada kesalahan pada pengisian data anda, mohon diperiksa kembali.',
                                            icon: 'error',
                                            confirmButtonText: 'Tutup'
                                        })
                                    </script>
                                @endif
                                <tr>
                                    <td>
                                        <div class="alert alert-primary" role="alert">
                                            Data Pemohon
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                        <div class="text">
                                            <h4>Nama:</h4>
                                            <input type="text" name="reservasi_nama" class="form-control @error('reservasi_nama') is-invalid @enderror" value="{{ $data->reservasi_nama }}">
                                            @error('reservasi_nama')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Nama Instansi Pemohon:</h4>
                                            <input type="text" name="reservasi_nama_instansi" class="form-control @error('reservasi_nama_instansi') is-invalid @enderror" value="{{ $data->reservasi_nama_instansi }}">
                                            @error('reservasi_nama_instansi')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Email Instansi Pemohon:</h4>
                                            <input type="email" name="reservasi_email" class="form-control @error('reservasi_email') is-invalid @enderror" value="{{ $data->reservasi_email }}" disabled>
                                            @error('reservasi_email')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Nomor Kontak (dapat menerima panggilan):</h4>
                                            <input type="number" minlength="12" maxlength="14" name="reservasi_kontak" class="form-control @error('reservasi_kontak') is-invalid @enderror" value="{{ $data->reservasi_kontak }}">
                                            @error('reservasi_kontak')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Asal Provinsi:</h4>
                                            <input type="text" name="reservasi_provinsi" class="form-control @error('reservasi_provinsi') is-invalid @enderror" value="{{ $data->reservasi_provinsi }}">
                                            @error('reservasi_provinsi')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Alamat instansi:</h4>
                                            <input type="text" name="reservasi_alamat" class="form-control @error('reservasi_alamat') is-invalid @enderror" value="{{ $data->reservasi_alamat }}">
                                            @error('reservasi_alamat')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <h4>Jadwal Berkunjung:</h4>
                                            <input type="datetime-local" name="reservasi_jadwal_berkunjung" class="form-control @error('reservasi_jadwal_berkunjung') is-invalid @enderror" value="{{ $data->reservasi_jadwal_berkunjung }}">
                                            @error('reservasi_jadwal_berkunjung')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Topik diskusi (terangkan dengan jelas):</h4>
                                            <input type="text" name="reservasi_topik" class="form-control @error('reservasi_topik') is-invalid @enderror" value="{{ $data->reservasi_topik }}">
                                            @error('reservasi_topik')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>tujuan OPD yang akan dikunjungi:</h4>
                                            <input type="text" name="reservasi_tujuan" class="form-control @error('reservasi_tujuan') is-invalid @enderror" value="{{ $data->reservasi_tujuan }}">
                                            @error('reservasi_tujuan')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Jumlah Peserta:</h4>
                                            <input type="number" name="reservasi_jumlah_peserta" class="form-control @error('reservasi_jumlah_peserta') is-invalid @enderror" value="{{ $data->reservasi_jumlah_peserta }}">
                                            @error('reservasi_jumlah_peserta')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Keterangan:</h4>
                                            <input type="text" name="reservasi_keterangan" class="form-control @error('reservasi_keterangan') is-invalid @enderror" value="{{ $data->reservasi_keterangan }}">
                                            @error('reservasi_keterangan')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <input type="text" name="reservasi_no_surat" class="form-control @error('reservasi_no_surat') is-invalid @enderror" value="{{ $data->reservasi_no_surat }}">
                                            @error('reservasi_no_surat')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.5s">
                                        <div class="text">
                                            <h4>Kepada:</h4>
                                            <input type="text" name="reservasi_kepada" class="form-control @error('reservasi_kepada') is-invalid @enderror" value="{{ $data->reservasi_kepada }}">
                                            @error('reservasi_kepada')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-scroll-reveal="enter right move 30px over 0.6s after 0.6s">
                                        <div class="text">
                                            <h4>Surat Permohonan Kunjungan :</h4>
                                            <a target="blank__" class="btn btn-primary btn-sm" href="{{ asset('reservasi_surat_permohonan_kunjungan/'.$data->reservasi_surat_permohonan_kunjungan) }}">Lihat Surat</a>
                                            <br/>
                                            <br/>
                                            <input type="file" name="reservasi_surat_permohonan_kunjungan" accept="image/*" class="form-control @error('reservasi_surat_permohonan_kunjungan') is-invalid @enderror">
                                            @error('reservasi_surat_permohonan_kunjungan')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="hidden" name="reservasi_kepada" class="form-control" value="{{ $data->reservasi_status_id }}">
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