<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TataCara;

class TataCaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_data = TataCara::where('tata_cara_aktif',1)->get();
        return view('tatacara/front/main', compact('list_data'));
    }

    public function indexBack()
    {
        $list_data = TataCara::all();
        return view('tatacara/back/main', compact('list_data'));
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
            'tata_cara_keterangan' => 'required',
        ],[
            'tata_cara_keterangan.required' => 'Data keterangan tata cara tidak boleh kosong',
        ]);
        $data = new TataCara;
        $data->tata_cara_keterangan    = $request->tata_cara_keterangan;
        $data->tata_cara_aktif  = 1;
        $data->save();
        return redirect(route('tatacara_back'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TataCara::where('tata_cara_id',decrypt($id))->first();
        return view('tatacara/back/edit',compact('data'));
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
        $data = TataCara::find(decrypt($id));
        $data->tata_cara_keterangan = $request->tata_cara_keterangan;
        $data->tata_cara_aktif = $request->tata_cara_aktif;
        $data->save();
        return redirect(route('tatacara_back'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TataCara::find(decrypt($id));
        $data->delete();
        return redirect(route('tatacara_back'));
    }
}
