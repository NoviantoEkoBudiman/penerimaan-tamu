@extends('templates/user')
@section('content')
<div class="container table-tata-cara">
    <div class="row">
        <div data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <h1>TATA CARA PENERIMAAN KUNJUNGAN DI <br/> <em>PEMERINTAH KOTA YOGYAKARTA</em></h1>
        </div>
        <table>
            @foreach ($list_data as $key=>$item)
                <tr style="text-align: left;">
                    <td>{{ $key+1 }}.</td>
                    <td>{{ $item->tata_cara_isi }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <table>
        <tr>
            <td><input type="checkbox" class="form-control" id="setuju" onchange="document.getElementById('lanjutkan').disabled = !this.checked;" ></td>
            <td style="text-align: left">Saya telah membaca dan memahami Tata Cara Penerimaan Kunjungan di Pemerintahan Kota Yogyakarta</td>
        </tr>
    </table>
    <button class="btn btn-md btn-info">Batal</button>
    <a class="btn btn-md btn-primary" id="lanjutkan" href="{{ route('reservasi.index') }}" disabled>Lanjutkan</a>
</div>
@endsection