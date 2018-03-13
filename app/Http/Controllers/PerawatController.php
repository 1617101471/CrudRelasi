<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perawat;
use App\pasien;
use Session;

class PerawatController extends Controller
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
        $perawat = perawat::with('pasien')->get();
        return view('perawat.index',compact('perawat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = pasien::all();
        return view('perawat.create',compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'pasien_id' => 'required'
        ]);
        $wali = new perawat;
        $wali->nama = $request->nama;
        $wali->pasien_id = $request->pasien_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$wali->nama</b>"
        ]);
        return redirect()->route('perawat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perawat = perawat::findOrFail($id);
        return view('perawat.show',compact('perawat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perawat = perawat::findOrFail($id);
        $mhs = pasien::all();
        $selectedperawat = perawat::findOrFail($id)->mahasiswa_id;
        return view('perawat.edit',compact('mhs','perawat','selectedperawat'));
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
        $this->validate($request,[
            'nama' => 'required|',
            'pasien_id' => 'required'
        ]);
        $wali = perawat::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->pasien_id = $request->pasien_id;
        $wali->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$wali->nama</b>"
        ]);
        return redirect()->route('perawat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = perawat::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('perawat.index');
    }
}
