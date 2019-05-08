<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obat;

class ObatController extends Controller
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
        $obats = obat::paginate(10);
        return view('obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_obat'=>'required|max:255',
            'aturan_makan'=>'required|max:255',
            'tanggal_kadaluarsa'=>'required|max:255',
            'harga'=>'required|max:255'
        ]);

        $obats = new obat;
        $obats->nama_obat = $request->nama_obat;
        $obats->aturan_makan = $request->aturan_makan;
        $obats->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obats->harga = $request->harga;
        $obats->save();
        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obats = obat::findOrFail($id);
        return view('obat.show', compact('obats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obats = obat::findOrFail($id);
        return view('obat.edit', compact('obats'));
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
        $this->validate($request, [
            'nama_obat'=>'required|max:255',
            'aturan_makan'=>'required|max:255',
            'tanggal_kadaluarsa'=>'required|max:255',
            'harga'=>'required|max:255'
        ]);

        $obats = obat::findOrFail($id);
        $obats->nama_obat = $request->nama_obat;
        $obats->aturan_makan = $request->aturan_makan;
        $obats->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $obats->harga = $request->harga;
        $obats->save();
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obats = obat::findOrFail($id);
        $obats->delete();
        return redirect()->route('obat.index');
    }
}
