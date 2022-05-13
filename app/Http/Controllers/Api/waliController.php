<?php

namespace App\Http\Controllers\Api;

use App\Models\wali;
use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\waliResource;
use Illuminate\Support\Facades\Validator;
use DB;

class waliController extends Controller
{
    public function index()
    {
        return new waliResource(Wali::all());
    }

    public function create(Request $request)
    {
        //
        $wali = new wali();
        $wali->wali_guru = $request->wali_guru;
        $wali->save();

        return "Data Tersimpan";
    }

    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'wali_guru'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $wali = wali::create([
            'wali_guru'     => $request->wali_guru
        ]);

        return new waliResource($wali);
    }

    public function show()
    {
        $wali = wali::select('id', 'wali_guru')->get();


        return new waliResource($wali);
    }

    public function update(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id'   => 'required',
            'wali_guru'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $wali = wali::where('id', $request->id)->update([
            'wali_guru' => $request->wali_guru
        ]);

        $result = wali::where('id', $request->id)->first();

        return new waliResource($result);
    }

    public function destroy(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $wali = wali::where('id', $request->id)->delete();

        $result = array("status" => "sukses", "message" => "Hapus Berhasil");

        return new waliResource($result);
    }

    public function showWithSiswa()
    {
        $result =  DB::table('siswas')
            ->join('walis', 'walis.id', '=', 'siwas.id_wali')
            ->get();
        return $result;
    }
}