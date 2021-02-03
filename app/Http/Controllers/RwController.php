<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class RwController extends Controller
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
        $rw =  Rw::with('kelurahan')->get();
        return view('rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kel = Kelurahan::all();
        return view('rw.create',compact('kel'));
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


            'nama' => 'required',


        ], [

            'nama.required' => 'Rw is required'

        ]);

        $rw = new Rw();
        $rw->id_kel = $request->id_kel;
        $rw->nama =$request->nama;
        $rw->save();
        return redirect()->route('rw.index')->with(['message' => 'Data rw Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('rw.show',compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kel = Kelurahan::all();
        return view('rw.edit',compact('rw','kel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rw = Rw::findOrFail($id);
        $rw->id_kel = $request->id_kel;
        $rw->nama = $request->nama;
        $rw->save();
        return redirect()->route('rw.index')->with(['message' => 'Data rw Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')->with(['message' => 'Data rw Berhasil dihapus']);
    }
}
