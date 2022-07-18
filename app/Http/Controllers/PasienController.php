<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pasien.index',[
            'pasiens'=>Pasien::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nik'=>'required|unique:pasiens,nik',
            'nama_pasien'=>'required',
            'umur_pasien'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
        ]);

        Pasien::create($validationData);
        return redirect('/pasiens')->with('pesan_tambah','Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit',[
            'pasiens'=>$pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validationData = $request->validate([
            'nik'=>'required',
            'nama_pasien'=>'required',
            'umur_pasien'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
        ]);

        Pasien::where('id',$pasien->id)->update($validationData);
        return redirect('/pasiens')->with('pesan_edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy('id',$pasien->id);
        return redirect('/pasiens')->with('pesan_hapus','Data Berhasil di Hapus');

    }
}
