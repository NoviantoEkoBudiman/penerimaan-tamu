@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrasi</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="user_nama_dinas" class="col-md-4 col-form-label text-md-end">Nama Dinas</label>

                            <div class="col-md-6">
                                <input id="user_nama_dinas" type="text" class="form-control @error('user_nama_dinas') is-invalid @enderror" name="user_nama_dinas" value="{{ old('user_nama_dinas') }}" required autocomplete="user_nama_dinas" autofocus>

                                @error('user_nama_dinas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="user_email" type="user_email" class="form-control @error('user_email') is-invalid @enderror" name="user_email" value="{{ old('user_email') }}" required autocomplete="user_email">

                                @error('user_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_kontak" class="col-md-4 col-form-label text-md-end">Kontak</label>

                            <div class="col-md-6">
                                <input id="user_kontak" type="string" class="form-control @error('user_kontak') is-invalid @enderror" name="user_kontak" value="{{ old('user_kontak') }}" required autocomplete="user_kontak">

                                @error('user_kontak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_asal_provinsi" class="col-md-4 col-form-label text-md-end">Provinsi</label>

                            <div class="col-md-6">
                                @php
                                    $provinsi = Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi')['provinsi'];
                                @endphp
                                <select class="form-control" name="user_asal_provinsi" id="user_asal_provinsi">
                                    <option selected disabled></option>
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>

                                @error('user_asal_provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>

                            <div class="col-md-6">
                                <input id="user_alamat" type="string" class="form-control @error('user_alamat') is-invalid @enderror" name="user_alamat" value="{{ old('user_alamat') }}" required autocomplete="user_alamat">

                                @error('user_alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrasi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
