<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AbsensiResource;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensis = Absensi::latest()->get();
        return response()->json([
            'status' => 200,
            'respon' => 'sukses',
            'message' => 'Berhasil Get All Data',
            'data' => AbsensiResource::collection($absensis),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validator = Validator::make($request->all(), [
            // 'jam_masuk' => 'required',
            // 'jam_keluar' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 200,
                'respon' => 'gagal',
                'message' => $validator->errors(),
            ]);
        }

        $absensi = Absensi::create([
            'jam_masuk' => $request->get('jam_masuk'),
            'jam_keluar' => $request->get('jam_keluar'),
            'tanggal' => $request->get('tanggal'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun'),
        ]);

        return response()->json([
            'status' => 200,
            'respon' => 'sukses',
            'message' => 'Buat Data Berhasil',
            'data' => new AbsensiResource($absensi),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi,$tanggal,$bulan,$tahun)
    {   
        // return response()->json([
        //             // 'data' => new AbsensiResource($absensi),
        //             'message' => 'Data post found'. $tanggal .$bulan.$tahun,
        //             'success' => true
        //         ]);
        $req = Absensi::where('tanggal',$tanggal)->where('bulan',$bulan)->where('tahun',$tahun)->first();
        if($req == null){
            return response()->json([
                'status' => 200,
                'respon' => 'gagal',
                'message' => 'data tidak ditemukan',
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'respon' => 'sukses',
                'message' => 'Data Ditemukan',
                'data' => new AbsensiResource($absensi),
            ]);
        }

        // return response()->json([
        //     'data' => new AbsensiResource($absensi),
        //     'message' => 'Data post found',
        //     'success' => true
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $validator = Validator::make($request->all(), [
            // 'jam_masuk' => 'required',
            // 'jam_keluar' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 200,
                'respon' => 'gagal',
                'message' => $validator->errors(),
            ]);
        }

        $absensi->update([
            'jam_masuk' => $request->get('jam_masuk'),
            'jam_keluar' => $request->get('jam_keluar'),
            'tanggal' => $request->get('tanggal'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun'),
        ]);

        return response()->json([
            'status' => 200,
            'respon' => 'sukses',
            'message' => 'Update Data Berhasil',
            'data' => new AbsensiResource($absensi),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Absensi $absensi)
    // {
    //     $absensi->delete();

    //     return response()->json([
    //         'status' => 200,
    //         'respon' => 'sukses',
    //         'message' => 'Buat Data Berhasil',
    //         'data' => new AbsensiResource($absensi),
    //     ]);
    // }
}
