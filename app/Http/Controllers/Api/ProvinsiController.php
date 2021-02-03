<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        
        $res = [
            'success'=> true,
            'data'=>$provinsi,
            'message'=> 'Data Provinsi ditampilkan',
        ];
        return response()->json($res,200);
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
        $provinsi = new Provinsi();
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();

        $res = [
            'success'=> true,
            'data'=> $provinsi,
            'message'=> 'Data Berhasil ditambah',
        ];
        return response()->json($res,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($provinsi) {
            $provinsi = Provinsi::whereid($id)->first();

            $res = [
                'success'=> true,
                'data'=>$provinsi,
                'message'=> 'Data Provinsi ditampilkan',
            ];
            return response()->json($res,200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data Tidak Ditemukan!',
                'data'    => ''
            ], 404);

        }
       
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
        $provinsi = Provinsi::whereid($id)->first();
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();

        $res = [
            'success'=> true,
            'data'=>$provinsi,
            'message'=> 'Data Provinsi ditampilkan',
        ];
        return response()->json($res,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        $res = [
            'success'=> true,
            'data'=>$provinsi,
            'message'=> 'Data Provinsi dihapus',
        ];
        return response()->json($res,200);
    }
}
