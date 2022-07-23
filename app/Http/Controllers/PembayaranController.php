<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pembayaran.index',[
            'pembayarans'=>Pembayaran::latest()->paginate(8)
        ]);
    }

    public function print($id)
    {
        return view('admin.pembayaran.struk',[
            'pembayaran'=>Pembayaran::find($id)


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
        $pasiens = Pasien::all();
        $q = DB::table('pembayarans')->select(DB::raw('MAX(RIGHT(kode_pembayaran,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);

            }
        }else{
            $kd = "0001";
        }


        // $bayar =  DB::table('pembayarans')->select('total_bayar');
        // $byr = $bayar;
        $byr = "100000";
        
        
        
        
        
        return view('admin.pembayaran.create',compact('pemeriksaans','pasiens','kd','byr'));
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
            'kode_pembayaran'=>'required',
            'pemeriksaan_id'=>'required',
            'pasien_id'=>'required',
            'tanggal_bayar'=>'required',
            'total_bayar'=>'required',
            'status_bayar'=>'required'
        ]);

        Pembayaran::create($validationData);
        return redirect('/pembayaran')->with('pesan_tambah','Data Berhasil di Tambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('admin.pembayaran.edit',[
            'pembayarans'=>$pembayaran,
            'pemeriksaans'=>Pemeriksaan::all(),
            'pasiens'=>Pasien::all()
        ]);
    }

    public function edit_status($pembayaran,$status,)
    {
        DB::table('pembayarans')->where('id',$pembayaran)->update([
            'status_bayar' => $status
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pembayaran');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validationData = $request->validate([
            'kode_pembayaran'=>'required',
            'pemeriksaan_id'=>'required',
            'pasien_id'=>'required',
            'tanggal_bayar'=>'required',
            'total_bayar'=>'required',
            'status_bayar'=>'required'
        ]);

        Pembayaran::where('id',$pembayaran->id)->update($validationData);
        return redirect('/pembayaran')->with('pesan_edit','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        Pembayaran::destroy($pembayaran->id);
        return redirect('/pembayaran')->with('pesan_hapus','Data Berhasil di Hapus');

    }
}
