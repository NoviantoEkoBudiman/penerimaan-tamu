@extends('templates/admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Semua Data</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap" id="data-table">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Instansi</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key=>$data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->reservasi_nama }}</td>
                                    <td>{{ $data->reservasi_nama_instansi }}</td>
                                    <td>
                                        @if($data->reservasi_status_id == 1)
                                            {{ "Baru" }}
                                        @elseif($data->reservasi_status_id == 2)
                                            {{ "Dikembalikan" }}
                                        @elseif($data->reservasi_status_id == 3)
                                            {{ "Diterima" }}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('reservasi.edit',Crypt::encrypt($data->reservasi_id)) }}">Tindakan</a> |
                                        <a class="btn btn-sm btn-danger" href="">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
    $('#data-table').DataTable();
</script>
@endsection