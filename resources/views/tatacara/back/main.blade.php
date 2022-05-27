@extends('templates/admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                @if(Session::has('tambah'))
                    <script>
                        Swal.fire({
                            title: "Succes!",
                            text: "Data berhasil ditambah!",
                            icon: "success",
                            confirmButtonText: "Tutup"
                        })
                    </script>
                @elseif(Session::has('update'))
                    <script>
                        Swal.fire({
                            title: "Succes!",
                            text: "Data berhasil diupdate!",
                            icon: "success",
                            confirmButtonText: "Tutup"
                        })
                    </script>
                @elseif(Session::has('hapus'))
                    <script>
                        Swal.fire({
                            title: "Succes!",
                            text: "Data berhasil dihapus!",
                            icon: "success",
                            confirmButtonText: "Tutup"
                        })
                    </script>
                @endif
                <h3 class="box-title">Tata Cara</h3>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Tata Cara
                </button>
                <br/>
                <br/>
  
                <!-- Modal Tambah Data -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="{{ route('tatacara.store') }}" method="POST">
                                    @csrf
                                    <table class="table table-stripped">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                Keterangan<br/>
                                                <textarea name="tata_cara_keterangan" id="" cols="42" rows="5"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th class="border-top-0">No</th>
                            <th class="border-top-0" width="70%">Keterangan</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_data as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->tata_cara_keterangan }}</td>
                                <td>{{ ($item->tata_cara_aktif == 1) ? "Aktif" : "Tidak Aktif" }}</td>
                                <td>
                                    <a href="{{ route('tatacara.show',Crypt::encrypt($item->tata_cara_id)) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a class="btn btn-danger btn-sm hapus" data-id="{{ Crypt::encrypt($item->tata_cara_id) }}" data-href="{{ url('hapus_tata_cara') }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection