@extends('templates/admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Kesediaan</h3>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
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
                                <form class="form-horizontal form-material" action="{{ route('kesediaan.store') }}" method="POST">
                                    @csrf
                                    <table class="table table-stripped">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                Keterangan<br/>
                                                <textarea name="kesediaan_keterangan" id="" cols="42" rows="5" required oninvalid="this.setCustomValidity('Data keterangan tidak boleh kosong')"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;">
                                                Syarat Upload<br/>
                                                <select name="kesediaan_syarat_upload" class="form-control" required>
                                                    <option value="1">Wajib</option>
                                                    <option value="0">Tidak Wajib</option>
                                                </select>
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
                                <th class="border-top-0" width="10%">No</th>
                                <th class="border-top-0" width="60%">Keterangan</th>
                                <th class="border-top-0" width="10%">Syarat Upload</th>
                                <th class="border-top-0" width="10%">Status</th>
                                <th class="border-top-0" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_data as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->kesediaan_keterangan }}</td>
                                    <td>{{ ($item->kesediaan_syarat_upload == 1) ? "Wajib" : "Tidak Aktif" }}</td>
                                    <td>{{ ($item->kesediaan_aktif == 1) ? "Aktif" : "Tidak Aktif" }}</td>
                                    <td>
                                        <div class="input-group">
                                            <a href="{{ route('kesediaan.show',Crypt::encrypt($item->kesediaan_id)) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kesediaan.destroy',Crypt::encrypt($item->kesediaan_id)) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
@endsection