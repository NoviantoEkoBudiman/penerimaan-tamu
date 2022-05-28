<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use App\Models\Kesediaan;
use App\Models\KesediaanTercentang;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kesediaan = Kesediaan::all();
        return view('reservasi/front/main',compact('kesediaan'));
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
            'reservasi_email'                       => 'required',
            'reservasi_nama_dinas'                  => 'required',
            'reservasi_kontak'                      => 'required',
            'reservasi_asal_provinsi'               => 'required',
            'reservasi_alamat'                      => 'required',
            'reservasi_jadwal_berkunjung'           => 'required',
            'reservasi_topik'                       => 'required',
            'reservasi_dinas_tujuan'                => 'required',
            'reservasi_jumlah_peserta'              => 'required',
            'reservasi_keterangan'                  => 'required',
            'reservasi_no_surat'                    => 'required',
            'reservasi_kepada'                      => 'required',
            'reservasi_surat_permohonan_kunjungan'  => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'reservasi_email.required'                      => 'Email tidak boleh kosong',
            'reservasi_nama_dinas.required'                 => 'Nama dinas tidak boleh kosong',
            'reservasi_kontak.required'                     => 'Kontak tidak boleh kosong',
            'reservasi_asal_provinsi.required'              => 'Provinsi tidak boleh kosong',
            'reservasi_alamat.required'                     => 'Alamat tidak boleh kosong',
            'reservasi_jadwal_berkunjung.required'          => 'Jadwal berkunjung tidak boleh kosong',
            'reservasi_topik.required'                      => 'Topik tidak boleh kosong',
            'reservasi_dinas_tujuan.required'               => 'Tujuan tidak boleh kosong',
            'reservasi_jumlah_peserta.required'             => 'Jumlah peserta tidak boleh kosong',
            'reservasi_keterangan.required'                 => 'Keterangan tidak boleh kosong',
            'reservasi_no_surat.required'                   => 'Nomor surat tidak boleh kosong',
            'reservasi_kepada.required'                     => 'Kepada tidak boleh kosong',
            'reservasi_surat_permohonan_kunjungan.required' => 'Surat permohonan kunjungan tidak boleh kosong',
            'reservasi_surat_permohonan_kunjungan.mimes'    => 'Format surat permohonan hanya bisa JPG, JPEG, dan PNG',
        ]);

        if ($request->hasFile('reservasi_surat_permohonan_kunjungan')) {
            $imageName = time().'.'.$request->reservasi_surat_permohonan_kunjungan->getClientOriginalExtension();
            $request->reservasi_surat_permohonan_kunjungan->move(public_path('/reservasi_surat_permohonan_kunjungan'), $imageName);
        }else{
            $imageName = "";
        }

        $reservasi = new Reservasi;

        // Data Reservasi
        $reservasi->reservasi_status                        = 1;
        $reservasi->reservasi_email                         = $request->reservasi_email;

        //Data Pemohon
        $reservasi->reservasi_nama_dinas                    = $request->reservasi_nama_dinas;
        $reservasi->reservasi_kontak                        = $request->reservasi_kontak;
        $reservasi->reservasi_asal_provinsi                 = $request->reservasi_asal_provinsi;
        $reservasi->reservasi_alamat                        = $request->reservasi_alamat;

        // Data tujuan reservasi
        $reservasi->reservasi_jadwal_berkunjung             = $request->reservasi_jadwal_berkunjung;
        $reservasi->reservasi_topik                         = $request->reservasi_topik;
        $reservasi->reservasi_dinas_tujuan                  = $request->reservasi_dinas_tujuan;
        $reservasi->reservasi_jumlah_peserta                = $request->reservasi_jumlah_peserta;
        $reservasi->reservasi_keterangan                    = $request->reservasi_keterangan;
        $reservasi->reservasi_no_surat                      = $request->reservasi_no_surat;
        $reservasi->reservasi_kepada                        = $request->reservasi_kepada;
        $reservasi->reservasi_surat_permohonan_kunjungan    = $imageName;

        $reservasi->save();

        $request->session()->flash('status', 'Data reservasi telah dikirim.');

        $reservasiId = DB::getPdo()->lastInsertId();
        $totalKesediaan = Kesediaan::where('kesediaan_aktif',1)->get();
        
        foreach($request->kesediaan as $key=>$val){
            $kesediaan_tercentang = new KesediaanTercentang;
            $kesediaan_tercentang->reservasi_id = $reservasiId;
            $kesediaan_tercentang->kesediaan_id = $val;
            $kesediaan_tercentang->save();
        }

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
        $data = Reservasi::find(decrypt($id))->first();
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

    public function lihat_reservasi($id)
    {
        $data = Reservasi::where('reservasi_id',decrypt($id))->first();
        $KesediaanTercentang = KesediaanTercentang::with('kesediaan')->where('reservasi_id',decrypt($id))->get();
        return view('reservasi/back/lihat',compact('data','KesediaanTercentang'));
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
        $reservasi                      = Reservasi::find($id)->first();
        $reservasi->reservasi_status    = $request->reservasi_status;
        $reservasi->save();
        
        if($request->reservasi_status == 2){
            $request->session()->flash('dikembalikan', 'Data reservasi telah diupdate');
        }else{
            $request->session()->flash('diterima', 'Data reservasi telah diupdate');
        }

        return redirect(route('reservasi_back'));
    }

    public function perbaikan_data(Request $request, $id)
    {
        $validated = $request->validate([
            'reservasi_email'               => 'required',
            'reservasi_nama_dinas'          => 'required',
            'reservasi_kontak'              => 'required',
            'reservasi_asal_provinsi'       => 'required',
            'reservasi_alamat'              => 'required',
            'reservasi_jadwal_berkunjung'   => 'required',
            'reservasi_topik'               => 'required',
            'reservasi_dinas_tujuan'        => 'required',
            'reservasi_jumlah_peserta'      => 'required',
            'reservasi_keterangan'          => 'required',
            'reservasi_no_surat'            => 'required',
            'reservasi_kepada'              => 'required',
        ],
        [
            'reservasi_email.required'                      => 'Email tidak boleh kosong',
            'reservasi_nama_dinas.required'                 => 'Nama dinas tidak boleh kosong',
            'reservasi_kontak.required'                     => 'Kontak tidak boleh kosong',
            'reservasi_asal_provinsi.required'              => 'Asal provinsi tidak boleh kosong',
            'reservasi_alamat.required'                     => 'Alamat tidak boleh kosong',
            'reservasi_jadwal_berkunjung.required'          => 'Jadwal berkunjung tidak boleh kosong',
            'reservasi_topik.required'                      => 'Topik tidak boleh kosong',
            'reservasi_dinas_tujuan.required'               => 'Tujuan tidak boleh kosong',
            'reservasi_jumlah_peserta.required'             => 'Jumlah peserta tidak boleh kosong',
            'reservasi_keterangan.required'                 => 'Keterangan tidak boleh kosong',
            'reservasi_no_surat.required'                   => 'No surat tidak boleh kosong',
            'reservasi_kepada.required'                     => 'Kepada tidak boleh kosong',
            'reservasi_surat_permohonan_kunjungan.mimes'    => 'Format surat permohonan hanya bisa JPG, JPEG, dan PNG',
        ]);

        if ($request->hasFile('reservasi_surat_permohonan_kunjungan')) {
            $imageName = time().'.'.$request->reservasi_surat_permohonan_kunjungan->getClientOriginalExtension();
            $request->reservasi_surat_permohonan_kunjungan->move(public_path('/reservasi_surat_permohonan_kunjungan'), $imageName);
        }else{
            $imageName = $request->surat_asli;
        }

        $reservasi = Reservasi::find(decrypt($id))->first();

        // Data Reservasi
        $reservasi->reservasi_status                        = 5;
        $reservasi->reservasi_email                         = $request->reservasi_email;

        //Data Pemohon
        $reservasi->reservasi_nama_dinas                    = $request->reservasi_nama_dinas;
        $reservasi->reservasi_kontak                        = $request->reservasi_kontak;
        $reservasi->reservasi_asal_provinsi                 = $request->reservasi_asal_provinsi;
        $reservasi->reservasi_alamat                        = $request->reservasi_alamat;

        // Data tujuan reservasi
        $reservasi->reservasi_jadwal_berkunjung             = $request->reservasi_jadwal_berkunjung;
        $reservasi->reservasi_topik                         = $request->reservasi_topik;
        $reservasi->reservasi_dinas_tujuan                  = $request->reservasi_dinas_tujuan;
        $reservasi->reservasi_jumlah_peserta                = $request->reservasi_jumlah_peserta;
        $reservasi->reservasi_keterangan                    = $request->reservasi_keterangan;
        $reservasi->reservasi_no_surat                      = $request->reservasi_no_surat;
        $reservasi->reservasi_kepada                        = $request->reservasi_kepada;
        $reservasi->reservasi_surat_permohonan_kunjungan    = $imageName;
        $reservasi->save();
        $request->session()->flash('sukses','Data telah diperbaiki');
        return redirect(route('riwayat'));
    }
    
    public function lengkapi($id)
    {
        $data = KesediaanTercentang::with('kesediaan')->get();
        $status = Reservasi::where('reservasi_id',decrypt($id))->first();
        return view('reservasi/front/lengkapi',compact('data','status'));
    }

    public function upload_bukti(Request $request, $id)
    {
        $validation = $request->validate([
            'upload_bukti' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'upload_bukti.required' => 'Foto tidak boleh kosong',
            'upload_bukti.mimes' => 'Tipe file yang diterima hanya JPG/JPEG/PNG', 
        ]);
        
        if ($request->hasFile('upload_bukti')) {
            $imageName = time().'.'.$request->upload_bukti->getClientOriginalExtension();
            $request->upload_bukti->move(public_path('/upload_bukti'), $imageName);
        }else{
            $imageName = "";
        }

        $KesediaanTercentang = KesediaanTercentang::where('tercentang_id',$id)->first();
        $KesediaanTercentang->file_upload = $imageName;
        
        $KesediaanTercentang->save();
        return redirect(route('lengkapi',$request->segment));
    }

    public function kirim_bukti(Request $request, $id)
    {
        $data = Reservasi::where('reservasi_id',decrypt($id))->first();
        $data->reservasi_status = 4;
        $data->save();
        $request->session()->flash('bukti_terkirim','Bukti telah dikirim');
        return redirect(route('riwayat'));
    }

    public function tindakan_akhir($id)
    {
        $data = Reservasi::find(decrypt($id))->first();
        $KesediaanTercentang = KesediaanTercentang::with('kesediaan')->where('reservasi_id',decrypt($id))->get();
        return view('reservasi/back/tindakan_akhir',compact('data','KesediaanTercentang'));
    }

    public function update_tindakan_akhir(Request $request, $id)
    {
        $data = Reservasi::where('reservasi_id',decrypt($id))->first();
        $data->reservasi_status = $request->reservasi_status;
        $data->save();

        if($request->reservasi_status == 6){
            $request->session()->flash('disetujui', 'Data reservasi telah diterima');
        }else{
            $request->session()->flash('ditolak', 'Data reservasi telah ditolak');
        }

        return redirect(route('reservasi_back'));
    }
}
