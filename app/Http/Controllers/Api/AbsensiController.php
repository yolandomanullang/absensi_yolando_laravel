<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json([
            'data' => PostResource::collection($posts),
            'message' => 'Fetch all posts',
            'success' => true
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
            'jam_masuk' => 'null',
            'jam_keluar' => 'null',
            'tanggal' => 'required'
            'bulan' => 'required'
            'tahun' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $post = Post::create([
            'jam_masuk' => $request->get('jam_masuk'),
            'jam_keluar' => $request->get('jam_keluar'),
            'tanggal' => $request->get('tanggal'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun'),
        ]);

        return response()->json([
            'data' => new PostResource($post),
            'message' => 'Post created successfully.',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        return response()->json([
            'data' => new PostResource($post),
            'message' => 'Data post found',
            'success' => true
        ]);
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
            'jam_masuk' => 'null',
            'jam_keluar' => 'null',
            'tanggal' => 'required'
            'bulan' => 'required'
            'tahun' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $post->update([
            'jam_masuk' => $request->get('jam_masuk'),
            'jam_keluar' => $request->get('jam_keluar'),
            'tanggal' => $request->get('tanggal'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun'),
        ]);

        return response()->json([
            'data' => new PostResource($post),
            'message' => 'Post updated successfully',
            'success' => true
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        $post->delete();

        return response()->json([
            'data' => [],
            'message' => 'Post deleted successfully',
            'success' => true
        ]);
    }
}
