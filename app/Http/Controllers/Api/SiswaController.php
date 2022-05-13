<?php

namespace App\Http\Controllers\Api;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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
            'tanggal_lahir'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $siswa = siswa::create([
            'nisn'     => $request->nisn,
            'nama_siswa'     => $request->nama_siswa,
            'alamat_siswa'     => $request->alamat_siswa,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'agama'     => $request->agama,
            'tempat_lahir'     => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir
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
            'tanggal_lahir'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $siswa->update([
            'nisn'     => $request->nisn,
            'nama_siswa'     => $request->nama_siswa,
            'alamat_siswa'     => $request->alamat_siswa,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'agama'     => $request->agama,
            'tempat_lahir'     => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir
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
