<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.resep_obat.index',[
            'resep_obat'=>ResepObat::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resep_obat.create',[
            'rekam_medis'=>RekamMedis::all(),
            'obats'=>Obat::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'rekam_medis_id'=>'required',
            'obat_id'=>'required',
            'jumlah_obat'=>'required',
            'keterangan'=>'required',
        ]);

        ResepObat::create($validationData);
        return redirect('/resep-obat')->with('pesan_tambah','Data Berhasil di Tambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function show(ResepObat $resepObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function edit(ResepObat $resepObat)
    {
        return view('admin.resep_obat.edit',[
            'resep_obat'=>$resepObat,
            'obats'=>Obat::all(),
            'rekam_medis'=>RekamMedis::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResepObat $resepObat)
    {
        $validationData = $request->validate([
            'rekam_medis_id'=>'required',
            'obat_id'=>'required',
            'jumlah_obat'=>'required',
            'keterangan'=>'required',
        ]);

        ResepObat::where('id',$resepObat->id)->update($validationData);
        return redirect('/resep-obat')->with('pesan_edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResepObat $resepObat,$id)
    {
        ResepObat::destroy($id);
        return redirect('/resep-obat')->with('pesan_hapus','Data Berhasil di Hapus');

    }
}
