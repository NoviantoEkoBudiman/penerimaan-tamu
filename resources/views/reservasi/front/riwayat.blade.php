@extends('templates/user')
@section('content')
<!-- ***** Features Big Item Start ***** -->
<div class="container">
    <table id="data-table" class="table table-stripped">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Nama Instansi</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key=>$item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->reservasi_nama }}</td>
                    <td>{{ $item->reservasi_nama_instansi }}</td>
                    <td>
                        @if($item->reservasi_status_id == 1)
                            {{ "Belum dilakukan tindakan" }}
                        @elseif($item->reservasi_status_id == 2)
                            {{ "Dikembalikan" }}
                        @elseif($item->reservasi_status_id == 3)
                            {{ "Diterima" }}
                        @endif
                    </td>
                    <td>
                        <button href="" class="btn btn-sm btn-primary" {{ ($item->reservasi_status_id == 2) ? null : "disabled" }}>Perbaiki</button>
                        <button href="" class="btn btn-sm btn-primary" {{ ($item->reservasi_status_id == 3) ? null : "disabled" }}>Lengkapi</button>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $('#data-table').DataTable();
</script>
<br/>
<br/>
<!-- ***** Features Big Item End ***** -->
@endsection