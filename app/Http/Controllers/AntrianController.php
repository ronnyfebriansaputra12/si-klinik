<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.antrian.index',[
            'antrians'=>Antrian::latest()->paginate(5),

        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $antrians = Antrian::all();
        $pasiens = Pasien::all();
        $q = DB::table('antrians')->select(DB::raw('MAX(RIGHT(no_antrian,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);

            }
        }else{
            $kd = "0001";
        }
        
        
        return view('admin.antrian.create',compact('antrians','pasiens','kd'));

        // return view('admin.antrian.create',[
        //     'antrians'=>Antrian::all(),
        //     'pasiens'=>Pasien::all()

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
            'no_antrian'=>'required',
            'pasien_id'=>'required',
            'tanggal_checkup'=>'required',
            'status_antrian'=>'required'
        ]);

        Antrian::create($validationData);
        
        return redirect('/antrian')->with('pesan_tambah','Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function show(Antrian $antrian)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function edit(Antrian $antrian)
    {
        return view('admin.antrian.edit',[
            'antrians'=>$antrian,
            'pasiens'=>Pasien::all()

        ]);
    }

    public function edit_status($antrian,$status,)
    {
        DB::table('antrians')->where('id',$antrian)->update([
            'status_antrian' => $status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/antrian');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antrian $antrian)
    {
        $validationData = $request->validate([
            'no_antrian'=>'required',
            'pasien_id'=>'required',
            'tanggal_checkup'=>'required',
            'status_antrian'=>'required'
        ]);

        Antrian::where('id',$antrian->id)->update($validationData);
        
        return redirect('/antrian')->with('pesan_edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Antrian  $antrian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antrian $antrian)
    {
        Antrian::destroy($antrian->id);
        return redirect('/antrian')->with('pesan_hapus','Data Berhasil di Hapus');

    }
}
