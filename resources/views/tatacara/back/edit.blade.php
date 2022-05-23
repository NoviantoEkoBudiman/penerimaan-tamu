@extends('templates/admin')

@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('tatacara.update',$data->id_tata_cara)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Data Pemohon</label>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Keterangan:</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="tata_cara_keterangan" class="form-control" value="{{ $data->tata_cara_keterangan }}">
                        </div>
                    </div>
                    <br/>
                        <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Status:</label>
                        <select name="tata_cara_aktif" class="form-control">
                            <option value="1" {{ ($data->tata_cara_aktif == 1) ? "selected" : null }}>Aktif</option>
                            <option value="0" {{ ($data->tata_cara_aktif == 0) ? "selected" : null }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

@endsection