<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawans;
use App\Models\Absens;
use Auth;
use Carbon\Carbon;
use PDF;

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
        $time = Absens::where('created_at', 'LIKE', '%'.Carbon::now()->format('Y-m-d').'%')->first();
        $masuk = Absens::where('user_id', $request->user_id)->where('type', 'masuk')->first();
        $keluar = Absens::where('user_id', $request->user_id)->where('type', 'keluar')->first();
        $izin = Absens::where('user_id', $request->user_id)->where('type', 'izin')->first();

        if ($time && $izin['type'] == 'izin') {
            return redirect()->back()->with('izin','Anda sudah melakukan absen izin!');
        }
        else{
            if ($time && $masuk['type'] == $request->type) {
            return redirect()->back()->with('gagal_masuk','Anda sudah melakukan absen masuk!');
            }
            elseif ($time && $keluar['type'] == $request->type) {
                return redirect()->back()->with('gagal_keluar','Anda sudah melakukan absen keluar!');
            }
            else{

                $save = new Absens;
                $save->user_id = strip_tags($request->user_id);
                $save->type = strip_tags($request->type);
                $save->explanation = strip_tags($request->explanation);
                $save->level = strip_tags($request->level);
                $save->save();

                return redirect()->back()->with('berhasil','Anda sudah absen, terima kasih!');      
            }    
        }
    }

    public function cetak_pdf()
    {
        // Dashboard 
        $karyawan = Karyawans::all();
        $absen = Absens::all();
        $tanggal = Carbon::now();

        $pdf = PDF::loadview('admin.cetak_pdf',compact('karyawan','absen','tanggal'));
        return $pdf->stream(Carbon::now()->format('Y-m-d').' laporan-pegawai-pdf');
    }
    public function pdf_detail($id)
    {
        $karyawan = Karyawans::where('id',$id)->first();
        $absen = Absens::all();
        $tanggal = Carbon::now();

        $pdf = PDF::loadview('admin.cetak_detail_pdf',compact('karyawan','absen','tanggal'));
        return $pdf->stream(Carbon::now()->format('Y-m-d').' laporan-pegawai-pdf');
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
