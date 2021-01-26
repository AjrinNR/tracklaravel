<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Kasus;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kasus = Kasus::with('country')->get();
        return view('kasus.index',compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        return view('kasus.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = new Kasus();
        $kasus->id_negara = $request->id_negara;
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['message' => 'Data Kasus Global Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('kasus.show',compact('kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasus = Kasus::findOrFail($id);
        $country = Country::all();
        return view('kasus.edit',compact('kasus','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->id_negara = $request->id_negara;
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['message' => 'Data Kasus Global Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id)->delete();
        return redirect()->route('kasus.index')->with(['message' => 'Data Kasus Global Berhasil diubah']);
    }
}
