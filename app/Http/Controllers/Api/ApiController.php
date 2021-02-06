<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use Illuminate\Support\Carbon;
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

        $positif = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal','kasus2s.tanggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->whereDay('kasus2s.tanggal',today())
                    ->sum('kasus2s.jumlah_positif');
        $sembuh = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal','kasus2s.tanggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->whereDay('kasus2s.tanggal',today())
                    ->sum('kasus2s.jumlah_sembuh');
        $meninggal = DB::table('rws')->select('kasus2s.jumlah_positif',
                    'kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal','kasus2s.tanggal')
                    ->join('kasus2s','rws.id','=','kasus2s.id_rw')
                    ->whereDay('kasus2s.tanggal',today())
                    ->sum('kasus2s.jumlah_meninggal');
        
        $dat = [

            'data' => 'Data Kasus Indonesia ',
            'Jumlah Positif' => $jml_pos ,
            'Jumlah Sembuh' => $jml_sem ,
            'Jumlah Meninggal' => $jml_men ,
            'message'=>'Data Kasus Indonesia ditampilkan'
        ];
        $dit=['kasus' => 'Data Kasus Indonesia per Hari Ini',
        'Jumlah Positif per Hari ini' => $positif ,
        'Jumlah Sembuh per Hari ini' => $sembuh ,
        'Jumlah Meninggal per Hari ini' => $meninggal ,
        'Tanggal'=> Carbon::now()->format('d-m-y'),];

        $dut = [
            'success'=>200,
            'Hari Ini'=>$dit,
            'Total' => $dat
        ];
        return response()->json($dut,200);

        
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

    public function kotaId($id){
        $tampil = DB::table('kotas')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                  ->join('rws','rws.id_kel','=','kelurahans.id')
                  ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                  ->where('kotas.id',$id)
                  ->select('nama_kota',
                          DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                          DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                          DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                  ->groupBy('nama_kota')->get();

        $res = [
            'success'=>true,
            'Data kota'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function kota(){
        $tampil = DB::table('kotas')
                ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                ->join('rws','rws.id_kel','=','kelurahans.id')
                ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                ->select('nama_kota',
                    DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                    DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kota')->get();

        $res = [
            'success'=>true,
            'Data kota'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function kecamatanId($id){
        $tampil = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                ->join('rws','rws.id_kel','=','kelurahans.id')
                ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                ->where('kecamatans.id',$id)
                ->select('nama_kec',
                    DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                    DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kec')->get();

        $res = [
            'success'=>true,
            'Data Kecamatan'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function kecamatan(){
        $tampil = DB::table('kecamatans')
                ->join('kelurahans','kelurahans.id_kec','=','kecamatans.id')
                ->join('rws','rws.id_kel','=','kelurahans.id')
                ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                ->select('nama_kec',
                    DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                    DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kec')->get();

        $res = [
            'success'=>true,
            'Data Kecamatan'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function kelurahanId($id){
        
        $tampil = DB::table('kelurahans')
                ->join('rws','rws.id_kel','=','kelurahans.id')
                ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                ->select('nama_kelurahan',
                    DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                    DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kelurahan')->get();

        $res = [
            'success'=>true,
            'Data kelurahan'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function kelurahan(){
        $tampil = DB::table('kelurahans')
                ->join('rws','rws.id_kel','=','kelurahans.id')
                ->join('kasus2s','kasus2s.id_rw','=','rws.id')
                ->select('nama_kelurahan',
                    DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                    DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                    DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kelurahan')->get();

        $res = [
            'success'=>true,
            'Data kelurahan'=>$tampil,
            'Message'=>'Data ditampilkan',
        ];
        return response()->json($res,200);
    }

    public function global(){
        $url= Http::get('https://api.kawalcorona.com/')->json();
        $data = [];
        foreach ($url as $key => $value) {
            $ul = $value['attributes'];
            $res =[
                'Id'=>$ul['OBJECTID'],
                'Country'=>$ul['Country_Region'],
                'Confirmed'=>$ul['Confirmed'],
                'Deaths'=>$ul['Deaths'],
                'Recovered'=>$ul['Recovered'],
            ];
            array_push($data,$res);
        }
        $response =[
            'success'=> true,
            'Country'=>$data,
            'message'=>'Data berhasil ditampilkan',
        ];
        return response()->json($response,200);
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
