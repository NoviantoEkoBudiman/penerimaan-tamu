<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kesediaan;

class KesediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_data = kesediaan::all();
        return view('kesediaan/back/main',compact('list_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kesediaan_keterangan' => 'required',
        ],[
            'kesediaan_keterangan.required' => 'Data keterangan tidak boleh kosong',
        ]);
        
        $kesediaan = new Kesediaan;
        $kesediaan->kesediaan_keterangan = $request->kesediaan_keterangan;
        $kesediaan->kesediaan_syarat_upload = $request->kesediaan_syarat_upload;
        $kesediaan->kesediaan_aktif = 1;
        $kesediaan->save();
        $request->session()->flash('tambah','Data berhasil ditambah');
        return redirect(route('kesediaan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kesediaan::where('kesediaan_id',decrypt($id))->first();
        return view('kesediaan/back/edit',compact('data'));
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
        $data = Kesediaan::find(decrypt($id));
        $data->kesediaan_keterangan = $request->kesediaan_keterangan;
        $data->kesediaan_syarat_upload = $request->kesediaan_syarat_upload;
        $data->kesediaan_aktif = $request->kesediaan_aktif;
        $data->save();
        $request->session()->flash('update','Data berhasil diupdate');
        return redirect(route('kesediaan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kesediaan::where('kesediaan_id',decrypt($id))->first();
        $data->delete();
        return back()->with('hapus', 'Data berhasil ditambah!');
    }
}
