<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class KelurahanController extends Controller
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
        $kel = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index',compact('kel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kec = Kecamatan::all();
        return view('kelurahan.create', compact('kec'));
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

            'id_kec' => 'required',

            'nama_kelurahan' => 'required|unique:kelurahans',


        ], [
            'id_kec.required' => 'Kecamatan is required',

            'nama_kelurahan.required' => 'Kelurahan is required'

        ]);


        $kel = new Kelurahan();
        $kel->id_kec = $request->id_kec;
        $kel->nama_kelurahan = $request->nama_kelurahan;
        $kel->save();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data kelurahan Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kel = Kelurahan::findOrFail($id);
        return view('kelurahan.show',compact('kel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kel = Kelurahan::findOrFail($id);
        $kec = Kecamatan::all();
        return view('kelurahan.edit',compact('kel','kec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kel = Kelurahan::findOrFail($id);
        $kel->id_kec = $request->id_kec;
        $kel->nama_kelurahan = $request->nama_kelurahan;
        $kel->save();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data kelurahan Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kel = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data kelurahab Berhasil dihapus']);
    }
}
