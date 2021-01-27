<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kasus2;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class Kasus2Controller extends Controller
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
        $kasus2 = Kasus2::with('rw')->get();
        return view('kasus2.index',compact('kasus2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('kasus2.create',compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_rw' => 'required',

            'jumlah_positif' => 'required|int',

            'jumlah_sembuh' => 'required|int',

            'jumlah_meninggal' => 'required|int',

            'tanggal' => 'required',


        ], [
            'id_rw.required' => 'RW is required',

            'jumlah_positif.required' => 'Jumlah Positif is required',
            
            'jumlah_sembuh.required' => 'Jumlah sembuh is required',

            'jumlah_meninggal.required' => 'Jumlah meninggal is required',

            'tanggal.required' => 'Tanggal is required'

        ]);

        $kasus2 = new Kasus2();
        $kasus2->id_rw = $request->id_rw;
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();
        return redirect()->route('kasus2.index')->with(['message' => 'Data Kasus Indonesia Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        return view('kasus2.show',compact('kasus2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $rw = Rw::all();
        return view('kasus2.edit',compact('kasus2','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $kasus2->id_rw = $request->id_rw;
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->save();
        return redirect()->route('kasus2.index')->with(['message' => 'Data Kasus Indonesia Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus2 = Kasus2::findOrFail($id)->delete();
        return redirect()->route('kasus2.index')->with(['message' => 'Data Kasus Indonesia Berhasil diubah']);
    }
}
