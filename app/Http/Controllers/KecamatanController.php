<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;


class KecamatanController extends Controller
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
        $kec = Kecamatan::with('kota')->get();
        return view('kecamatan.index',compact('kec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view('kecamatan.create',compact('kota'));
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



            'nama_kec' => 'required|unique:kecamatans',


        ], [


            'nama_kec.required' => 'Kecamatan is required'

        ]);


        $kec = new Kecamatan();
        $kec->id_kota = $request->id_kota;
        $kec->nama_kec = $request->nama_kec;
        $kec->save();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data kecamatan Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kec = Kecamatan::findOrFail($id);
        return view('kecamatan.show',compact('kec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kec = Kecamatan::findOrFaiL($id);
        $kota = Kota::all();
        return view('kecamatan.edit',compact('kec','kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kec = Kecamatan::findOrFail($id);
        $kec->id_kota = $request->id_kota;
        $kec->nama_kec = $request->nama_kec;
        $kec->save();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data kecamatan Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kec = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data kota Berhasil Dihapus']);
    }
}
