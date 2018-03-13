<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dokter;
use App\pasien;
use Session;

class PasienController extends Controller
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
        $posts = pasien::with('dokter')->get();
        return view('pasien.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = dokter::all();
        return view('pasien.create',compact('posts'));
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
            'penyakit' => 'required|',
            'dokter_id' => 'required'
        ]);
        $mhs = new pasien;
        $mhs->nama = $request->nama;
        $mhs->penyakit = $request->penyakit;
        $mhs->dokter_id = $request->dokter_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mhs->nama</b>"
        ]);
        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = pasien::findOrFail($id);
        return view('pasien.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = pasien::findOrFail($id);
        $dokter = dokter::all();
        $selecteddokter = pasien::findOrFail($id)->dokter_id;
        return view('pasien.edit',compact('mhs','dokter','selecteddokter'));
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
            'penyakit' => 'required|',
            'dokter_id' => 'required'
        ]);
        $mhs = pasien::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->penyakit = $request->penyakit;
        $mhs->dokter_id = $request->dokter_id;
        $mhs->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mhs->nama</b>"
        ]);
        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = pasien::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pasien.index');
    }
}
