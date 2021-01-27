<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class ProvinsiController extends Controller
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
        $prov = Provinsi::all();
        return view('provinsi.index', compact('prov'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
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

            'kode_prov' => 'required|int|unique:provinsis',

            'nama_prov' => 'required|unique:provinsis',


        ], [

            'kode_prov.required' => 'Kode is required',

            'nama_prov.required' => 'Provinsi is required'

        ]);


        $prov = new Provinsi();
        $prov->kode_prov = $request->kode_prov;
        $prov->nama_prov = $request->nama_prov;
        $prov->save();
        return redirect()->route('provinsi.index')->with(['message' => 'Data Provinsi Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prov = Provinsi::findOrFail($id);
        return view('provinsi.show',compact('prov'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prov = Provinsi::findOrFail($id);
        return view('provinsi.edit',compact('prov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prov = Provinsi::findOrFail($id);
        $prov->kode_prov = $request->kode_prov;
        $prov->nama_prov = $request->nama_prov;
        $prov->save();
        return redirect()->route('provinsi.index')->with(['message' => 'Data provinsi Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prov = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')->with(['message' => 'Data Provinsi Berhasil Di Hapus']);
    }
}
