<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawans;
use App\Models\Absens;
use Auth;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dashboard 
        $karyawan = Karyawans::all();
        $absen = Absens::all();

        return view ('admin.index',compact('karyawan','absen'));
    }

    public function karyawan()
    {

        return view ('admin.karyawan');
    }

    public function absen($id)
    {
        $detail = Karyawans::where('uuid', $id)->first();

        return view('absen', compact('detail'));
    }

    public function detail_absen($id)
    {
        $karyawan = Karyawans::where('id',$id)->first();
        $absen = Absens::all();

        return view('admin.detail_absen', compact('karyawan','absen'));
    }

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
        $save = new Absens;
        $save->user_id = strip_tags($request->user_id);
        $save->type = strip_tags($request->type);
        $save->explanation = strip_tags($request->explanation);
        $save->level = strip_tags($request->level);
        $save->save();

        return redirect()->back()->with('berhasil','Anda sudah absen, terima kasih!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
