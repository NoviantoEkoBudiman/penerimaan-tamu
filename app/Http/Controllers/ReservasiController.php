<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservasi/front/main');
    }

    public function indexBack()
    {
        $datas = Reservasi::orderBy('reservasi_id','DESC')->get();
        return view('reservasi/back/main', compact('datas'));
    }

    public function riwayat()
    {
        $datas = Reservasi::where('reservasi_email',Auth::user()->email)->orderBy('reservasi_id','ASC')->get();
        return view('reservasi/front/riwayat', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservasi_email' => 'required',
            'reservasi_nama' => 'required',
            'reservasi_nama_instansi' => 'required',
            'reservasi_kontak' => 'required',
            'reservasi_provinsi' => 'required',
            'reservasi_alamat' => 'required',
            'reservasi_jadwal_berkunjung' => 'required',
            'reservasi_topik' => 'required',
            'reservasi_tujuan' => 'required',
            'reservasi_jumlah_peserta' => 'required',
            'reservasi_keterangan' => 'required',
            'reservasi_no_surat' => 'required',
            'reservasi_kepada' => 'required',
            'reservasi_surat_permohonan_kunjungan' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'reservasi_email.required' => 'email tidak boleh kosong',
            'reservasi_nama.required' => 'nama tidak boleh kosong',
            'reservasi_nama_instansi.required' => 'nama_instansi tidak boleh kosong',
            'reservasi_kontak.required' => 'kontak tidak boleh kosong',
            'reservasi_provinsi.required' => 'provinsi tidak boleh kosong',
            'reservasi_alamat.required' => 'alamat tidak boleh kosong',
            'reservasi_jadwal_berkunjung.required' => 'jadwal berkunjung tidak boleh kosong',
            'reservasi_topik.required' => 'topik tidak boleh kosong',
            'reservasi_tujuan.required' => 'tujuan tidak boleh kosong',
            'reservasi_jumlah_peserta.required' => 'jumlah peserta tidak boleh kosong',
            'reservasi_keterangan.required' => 'keterangan tidak boleh kosong',
            'reservasi_no_surat.required' => 'no_surat tidak boleh kosong',
            'reservasi_kepada.required' => 'kepada tidak boleh kosong',
            'reservasi_surat_permohonan_kunjungan.required' => 'surat permohonan kunjungan tidak boleh kosong',
            'reservasi_surat_permohonan_kunjungan.mimes' => 'format surat permohonan hanya bisa JPG, JPEG, dan PNG',
        ]);

        if ($request->hasFile('reservasi_surat_permohonan_kunjungan')) {
            $imageName = time().'.'.$request->reservasi_surat_permohonan_kunjungan->getClientOriginalExtension();
            $request->reservasi_surat_permohonan_kunjungan->move(public_path('/reservasi_surat_permohonan_kunjungan'), $imageName);
        }else{
            $imageName = "";
        }

        $reservasi = new Reservasi;

        // Data Reservasi
        $reservasi->reservasi_status_id                     = 1;
        $reservasi->reservasi_email                         = $request->reservasi_email;
        $reservasi->reservasi_is_read                       = 0;
        $reservasi->reservasi_is_kirim_bukti                = 0;

        //Data Pemohon
        $reservasi->reservasi_nama                          = $request->reservasi_nama;
        $reservasi->reservasi_nama_instansi                 = $request->reservasi_nama_instansi;
        $reservasi->reservasi_kontak                        = $request->reservasi_kontak;
        $reservasi->reservasi_provinsi                      = $request->reservasi_provinsi;
        $reservasi->reservasi_alamat                        = $request->reservasi_alamat;

        // Data tujuan reservasi
        $reservasi->reservasi_jadwal_berkunjung             = $request->reservasi_jadwal_berkunjung;
        $reservasi->reservasi_topik                         = $request->reservasi_topik;
        $reservasi->reservasi_tujuan                        = $request->reservasi_tujuan;
        $reservasi->reservasi_jumlah_peserta                = $request->reservasi_jumlah_peserta;
        $reservasi->reservasi_keterangan                    = $request->reservasi_keterangan;
        $reservasi->reservasi_no_surat                      = $request->reservasi_no_surat;
        $reservasi->reservasi_kepada                        = $request->reservasi_kepada;
        $reservasi->reservasi_surat_permohonan_kunjungan    = $imageName;

        $reservasi->save();

        $request->session()->flash('status', 'Data reservasi telah dikirim.');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Reservasi::find($id)->first();
        return view('reservasi/front/perbaiki',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Reservasi::where('reservasi_id',decrypt($id))->first();
        $id = (int) decrypt($id);
        return view('reservasi/back/tindakan',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('reservasi_surat_permohonan_kunjungan')) {
            $imageName = time().'.'.$request->reservasi_surat_permohonan_kunjungan->getClientOriginalExtension();
            $request->reservasi_surat_permohonan_kunjungan->move(public_path('/reservasi_surat_permohonan_kunjungan'), $imageName);
        }else{
            $imageName = "";
        }

        $reservasi = Reservasi::find($id)->first();

        // Data Reservasi
        $reservasi->reservasi_status_id                     = 4;
        $reservasi->reservasi_email                         = $request->reservasi_email;
        $reservasi->reservasi_is_read                       = 0;
        $reservasi->reservasi_is_kirim_bukti                = 0;

        //Data Pemohon
        $reservasi->reservasi_nama                          = $request->reservasi_nama;
        $reservasi->reservasi_nama_instansi                 = $request->reservasi_nama_instansi;
        $reservasi->reservasi_kontak                        = $request->reservasi_kontak;
        $reservasi->reservasi_provinsi                      = $request->reservasi_provinsi;
        $reservasi->reservasi_alamat                        = $request->reservasi_alamat;

        // Data tujuan reservasi
        $reservasi->reservasi_jadwal_berkunjung             = $request->reservasi_jadwal_berkunjung;
        $reservasi->reservasi_topik                         = $request->reservasi_topik;
        $reservasi->reservasi_tujuan                        = $request->reservasi_tujuan;
        $reservasi->reservasi_jumlah_peserta                = $request->reservasi_jumlah_peserta;
        $reservasi->reservasi_keterangan                    = $request->reservasi_keterangan;
        $reservasi->reservasi_no_surat                      = $request->reservasi_no_surat;
        $reservasi->reservasi_kepada                        = $request->reservasi_kepada;
        $reservasi->reservasi_surat_permohonan_kunjungan    = $imageName;
        $reservasi->save();
        return redirect(route('riwayat'));
    }
    
    public function lengkapi($id)
    {
        return view('reservasi/front/lengkapi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
