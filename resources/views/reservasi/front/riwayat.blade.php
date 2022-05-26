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
                            {{ "Baru" }}
                        @elseif($item->reservasi_status_id == 2)
                            {{ "Dikembalikan" }}
                        @elseif($item->reservasi_status_id == 3)
                            {{ "Diterima" }}
                        @elseif($item->reservasi_status_id == 4)
                            {{ "Bukti Dikirim" }}
                        @elseif($item->reservasi_status_id == 5)
                            {{ "Disetujui" }}
                        @elseif($item->reservasi_status_id == 6)
                            {{ "Ditolak" }}
                        @endif
                    <td>
                        <a href="{{ route('reservasi.show', $item->reservasi_id) }}" class="btn btn-sm btn-primary {{ ($item->reservasi_status_id == 2) ? null : "disabled" }}">Perbaiki</a>
                        <a href="{{ route('lengkapi', $item->reservasi_id) }}" class="btn btn-sm btn-primary {{ ($item->reservasi_status_id == 3) ? null : "disabled" }}">Lengkapi</a>
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