@extends('templates/admin')

@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <hr>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Data Pemohon</label>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Nama Dinas:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_nama_dinas }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Nomor Kontak (dapat menerima panggilan):</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_kontak }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Asal Provinsi:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_asal_provinsi }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Alamat instansi:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_alamat }}" disabled>
                    </div>
                </div>
                <hr>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Data Tujuan Reservasi </label>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Jadwal Berkunjung:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_jadwal_berkunjung }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Topik diskusi:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_topik }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">tujuan OPD yang akan dikunjungi:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_dinas_tujuan }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Jumlah Peserta:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_jumlah_peserta }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Keterangan:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_keterangan }}" disabled>
                    </div>
                </div>
                <hr>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Data Surat Permohonan Kunjungan </label>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">No. Surat:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_no_surat }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Kepada:</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control" value="{{ $data->reservasi_kepada }}" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Surat Permohonan Kunjungan :</label>
                    <div class="col-md-12 border-bottom p-0">
                        <a target="_blank" href="{{ asset('reservasi_surat_permohonan_kunjungan/'.$data->reservasi_surat_permohonan_kunjungan) }}" class="btn btn-primary btn-md">
                            Lihat Surat
                        </a>
                    </div>
                </div>
                <hr>                    
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Upload Kesediaan</label>
                </div>
                <table class="table">
                    @foreach($KesediaanTercentang as $item)
                        <tr>
                            <td>{{ $item->kesediaan->kesediaan_keterangan }}</td>
                            <td><a target="_blank" href="{{ asset('upload_bukti/'.$item->file_upload) }}" class="btn btn-primary btn-sm">Lihat</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

@endsection