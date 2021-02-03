<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positif = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_positif');
        $sembuh = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_sembuh');
        $meninggal = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_meninggal');
        
        $res = [
            'success'=>true,
            'data' => 'Data Kasus Indonesia',
            'Jumlah Positif' => $positif,
            'Jumlah Sembuh' => $sembuh,
            'Jumlah Meninggal' => $meninggal,
            'message'=>'Data Kasus Indonesia ditampilkan'
        ];
        return response()->json($res,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function provinsiId($id){
        $tampil = DB::table('provinsis')
                  ->join('kotas','kotas.id_prov','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                  ->join('rws','rws.id_kel','=','kelurahans.id')
                  ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                  ->where('provinsis.id',$id)
                  ->select('nama_prov',
                          DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                          DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                          DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                  ->groupBy('nama_prov')->get();

        $res = [
            'success'=>true,
            'Data Provinsi'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function provinsi(){
        $tampil = DB::table('provinsis')
                  ->join('kotas','kotas.id_prov','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                  ->join('rws','rws.id_kel','=','kelurahans.id')
                  ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                  ->select('nama_prov',
                          DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                          DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                          DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                  ->groupBy('nama_prov')->get();

        $res = [
            'success'=>true,
            'Data Provinsi'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
