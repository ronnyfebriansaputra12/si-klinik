<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\RekamMedis;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rekam_medis.index',[
            'rekam_medis'=>RekamMedis::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekam_medis = RekamMedis::all();
        $pemeriksaans = Pemeriksaan::all();
        $dokters = Dokter::all();
        $q = DB::table('rekam_medis')->select(DB::raw('MAX(RIGHT(kode_rekam_medis,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);

            }
        }else{
            $kd = "0001";
        }
        
        
        return view('admin.rekam_medis.create',compact('rekam_medis','pemeriksaans','dokters','kd'));

        // return view('admin.rekam_medis.create',[
        //     'pemeriksaans'=>Pemeriksaan::all(),
        //     'dokters'=>Dokter::all(),
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
            'kode_rekam_medis'=>'required',
            'pemeriksaan_id'=>'required',
            'dokter_id'=>'required',
            'diagnosa'=>'required',
            'tindakan'=>'required',
            'rujukan'=>'required',
        ]);

        RekamMedis::create($validationData);
        return redirect('/rekam-medis')->with('pesan_tambah','Data Berhasil di Tambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekamMedis,$id)
    {
        return view('admin.rekam_medis.edit',[
            'rekam_medis'=>RekamMedis::find($id),
            'pemeriksaans'=>Pemeriksaan::all(),
            'dokters'=>Dokter::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis, $id)
    {
        $validationData = $request->validate([
            'kode_rekam_medis'=>'required',
            'pemeriksaan_id'=>'required',
            'dokter_id'=>'required',
            'diagnosa'=>'required',
            'tindakan'=>'required',
            'rujukan'=>'required',
        ]);

        RekamMedis::where('id',$id)->update($validationData);
        return redirect('/rekam-medis')->with('pesan_edit','Data Berhasil di Tambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis, $id)
    {
        RekamMedis::destroy($id);
        return redirect('/rekam-medis')->with('pesan_hapus','Data Berhasil di Tambah');

    }
}
