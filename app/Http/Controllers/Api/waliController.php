<?php

namespace App\Http\Controllers\Api;

use App\Models\Wali;
use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WaliResource;
use Illuminate\Support\Facades\Validator;
use DB;

class WaliController extends Controller
{
    public function index()
    {
        return new WaliResource(Wali::all());
    }

    public function create(Request $request)
    {
        //
        $wali = new Wali();
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
        $wali = Wali::create([
            'wali_guru'     => $request->wali_guru
        ]);

        return new WaliResource($wali);
    }

    public function show()
    {
        $wali = Wali::select('id', 'wali_guru')->get();


        return new WaliResource($wali);
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
        $wali = Wali::where('id', $request->id)->update([
            'wali_guru' => $request->wali_guru
        ]);

        $result = Wali::where('id', $request->id)->first();

        return new WaliResource($result);
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

        $wali = Wali::where('id', $request->id)->delete();

        $result = array("status" => "sukses", "message" => "Hapus Berhasil");

        return new WaliResource($result);
    }

    public function showWithSiswa()
    {
        $result =  DB::table('siswas')
            ->join('walis', 'walis.id', '=', 'siwas.id_wali')
            ->get();
        return $result;
    }
}