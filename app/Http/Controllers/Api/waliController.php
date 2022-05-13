<?php

namespace App\Http\Controllers\Api;

use App\Models\Wali;
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

    public function show(Wali $wali)
    {
        //
        return new WaliResource($wali);
    }

    public function update(Request $request, Wali $wali)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'wali_guru'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $wali->update([
            'wali_guru'     => $request->wali_guru
        ]);

        return new WaliResource($wali);
    }

    public function destroy(Wali $wali)
    {
        $wali->delete();

        return new WaliResource($wali);
    }

    public function joinTable()
    {
        $data = DB::table('walis')
            ->join('siswas', 'siswas.id_wali', '=', 'walis.id')
            ->get();

        return $data;
    }
}