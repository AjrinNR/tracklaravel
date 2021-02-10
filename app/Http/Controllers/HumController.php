<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use Illuminate\Support\Carbon;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus2;
use Illuminate\Http\Request;

class HumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jml_pos = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_positif');
        $jml_sem = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_sembuh');
        $jml_men = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_meninggal');

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
                  ->groupBy('nama_prov')->orderBy('nama_prov','ASC')
                  ->get();

        $url= Http::get('https://api.kawalcorona.com/')->json();
        $data = [];
        foreach ($url as $key => $value) {
            $ul = $value['attributes'];
            array_push($data);
        }

        return view('frontend.home', compact('jml_pos','jml_sem','jml_men','tampil','url','ul','data'));
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
