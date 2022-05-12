<?php

namespace App\Http\Controllers\Api;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SiswaResource(siswa::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nisn'   => 'required',
            'nama_siswa'   => 'required',
            'alamat_siswa'   => 'required',
            'jenis_kelamin'   => 'required',
            'agama'   => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'   => 'required',
            'id_sekolah'   => 'required',
            'id_prestasi'   => 'required',
            'id_wali'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $siswa = siswa::create([
            'nisn'     => $request->siswa,
            'nama_siswa'     => $request->siswa,
            'alamat_siswa'     => $request->siswa,
            'jenis_kelamin'     => $request->siswa,
            'agama'     => $request->siswa,
            'tempat_lahir'     => $request->siswa,
            'tanggal_lahir'     => $request->siswa,
            'nama_siswa'     => $request->siswa,
            'id_sekolah'     => $request->siswa,
            'id_prestasi'     => $request->siswa,
            'id_wali'     => $request->siswa,
        ]);

        return new SiswaResource($siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  siswa $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        return new SiswaResource($siswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  siswa $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nisn'   => 'required',
            'nama_siswa'   => 'required',
            'alamat_siswa'   => 'required',
            'jenis_kelamin'   => 'required',
            'agama'   => 'required',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'   => 'required',
            'id_sekolah'   => 'required',
            'id_prestasi'   => 'required',
            'id_wali'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $siswa->update([
            'nisn'     => $request->siswa,
            'nama_siswa'     => $request->siswa,
            'alamat_siswa'     => $request->siswa,
            'jenis_kelamin'     => $request->siswa,
            'agama'     => $request->siswa,
            'tempat_lahir'     => $request->siswa,
            'tanggal_lahir'     => $request->siswa,
            'nama_siswa'     => $request->siswa,
            'id_sekolah'     => $request->siswa,
            'id_prestasi'     => $request->siswa,
            'id_wali'     => $request->siswa,
        ]);

        return new SiswaResource($siswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  siswa $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        $siswa->delete();
        
        return new SiswaResource($siswa);
    }
}