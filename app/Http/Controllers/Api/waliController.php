<?php

namespace App\Http\Controllers\Api;

use App\Models\wali;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @param  int  $wali
     * @return \Illuminate\Http\Response
     */
    public function show(wali $wali)
    {
        return new waliResource($wali);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $wali
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
     * @param  int  $wali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,wali $wali)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(wali $wali)
    {
        $wali->delete();
        
        return new waliResource($wali);
    }
}
