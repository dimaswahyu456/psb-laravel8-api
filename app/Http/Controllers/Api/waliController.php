<?php

namespace App\Http\Controllers\Api;

use App\Models\wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\waliResource;
use Illuminate\Support\Facades\Validator;

class waliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new waliResource(wali::all());
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

    /**
     * Display the specified resource.
     *
     * @param  wali $wali
     * @return \Illuminate\Http\Response
     */
    public function show(wali $wali)
    {
        return new waliResource($wali);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  wali $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wali $wali)
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

        return new waliResource($wali);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  wali $wali
     * @return \Illuminate\Http\Response
     */
    public function destroy(wali $wali)
    {
        $wali->delete();
        
        return new waliResource($wali);
    }
}
