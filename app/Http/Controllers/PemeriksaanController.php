<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pemeriksaan.index',[
            'pemeriksaans'=>Pemeriksaan::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pemeriksaans = Pemeriksaan::all();
        $antrians = Antrian::all();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();


        $q = DB::table('pemeriksaans')->select(DB::raw('MAX(RIGHT(kode_pemeriksaan,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);

            }
        }else{
            $kd = "0001";
        }
        
        
        return view('admin.pemeriksaan.create',compact('pemeriksaans','antrians','pasiens','dokters','kd'));
        // return view('admin.pemeriksaan.create',[
        //     'antrians'=>Antrian::all(),
        //     'pasiens'=>Pasien::all(),
        //     'dokters'=>Dokter::all()
        // ]);
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
            'kode_pemeriksaan'=>'required',
            'antrian_id'=>'required',
            'pasien_id'=>'required',
            'dokter_id'=>'required',
            'tekanan_darah'=>'required',
            'suhu_badan'=>'required',
            'keluhan'=>'required',
            'status_pemeriksaan'=>'required',
        ]);

        Pemeriksaan::create($validationData);
        return redirect('/pemeriksaan')->with('pesan_tambah','Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        return view('admin.pemeriksaan.edit',[
            'pemeriksaans'=>$pemeriksaan,
            'antrians'=>Antrian::all(),
            'pasiens'=>Pasien::all(),
            'dokters'=>Dokter::all()
        ]);
    }

    public function edit_status($pemeriksaan,$status,)
    {
        DB::table('pemeriksaans')->where('id',$pemeriksaan)->update([
            'status_pemeriksaan' => $status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pemeriksaan');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $validationData = $request->validate([
            'kode_pemeriksaan'=>'required',
            'antrian_id'=>'required',
            'pasien_id'=>'required',
            'dokter_id'=>'required',
            'tekanan_darah'=>'required',
            'suhu_badan'=>'required',
            'keluhan'=>'required',
            'status_pemeriksaan'=>'required',
        ]);

        Pemeriksaan::where('id',$pemeriksaan->id)->update($validationData);
        return redirect('/pemeriksaan')->with('pesan_edit','Data Berhasil di Tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        Pemeriksaan::destroy($pemeriksaan->id);
        return redirect('/pemeriksaan')->with('pesan_hapus','Data Berhasil di Hapus');

    }
}
