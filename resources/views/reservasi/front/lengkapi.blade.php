@extends('templates/user')

@section('content')
<div class="container">
    @php $id = Request::segment(2) @endphp
    <form action="{{ route('kirim_bukti',$id) }}" method="POST">
        @method('PUT')
        @csrf
        @foreach ($data as $key=>$items)
            @php
                $upload[] = $items->file_upload;           
            @endphp    
            @if(in_array(null,$upload))
                @php $hasil = "disabled" @endphp
            @else
                @php $hasil = null @endphp
            @endif
        @endforeach
        <button class="btn btn-primary btn-sm" style="float: left;" {{$hasil}} {{ ($status->reservasi_status == 3) ? null : "disabled" }}>Kirim Bukti</button>
    </form>
    <br/>
    <br/>
    @error('upload_bukti')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: '{{ $message }}',
            })
        </script>
    @enderror
    <table class="table table-stripped">
        <thead>
            <tr>
                <td>No</td>
                <td>Keterangan</td>
                <td>Bukti</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key=>$items)
                <form action="{{ route('upload_bukti',$items->tercentang_id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <tr>
                        <td width="10%" class="text-left">{{ $key+1 }}</td>
                        <td width="50%" class="text-left">{{ $items->kesediaan->kesediaan_keterangan }}</td>
                        <td>
                            <a href="{{asset('upload_bukti/'.$items->file_upload)}}" target="_blank">
                                <img src="{{ ($items->file_upload == null) ? asset('pict/no-camera.png') : asset('upload_bukti/'.$items->file_upload) }}" width="90px" height="90px">
                            </a>
                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="upload_bukti" class="form-control">
                            <input type="hidden" name="segment" value="{{ Request::segment(2) }}">
                        </td>
                        <td class="text-left"><button style="vertical-align: center" class="btn btn-primary btn-sm" {{ ($status->reservasi_status == 3) ? null : "disabled" }}>Upload</button></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection