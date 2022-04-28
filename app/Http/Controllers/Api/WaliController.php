<?php

namespace App\Http\Controllers\Api;

use App\Models\wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WaliResource;
use Illuminate\Support\Facades\Validator;
use DB;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result =[];
        $walis =  DB::select('select * from walis');
       
        
        return response()->json(['data' => $walis]);
      
  
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
            'nama_wali'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $wali = wali::create([
            'nama_wali'     => $request->wali
        ]);

        return new WaliResource($wali);
    }

    /**
     * Display the specified resource.
     *
     * @param  wali $wali
     * @return \Illuminate\Http\Response
     */
    public function show(wali $wali)
    {
        return new WaliResource($wali);
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
            'nama_wali'   => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //update to database
        $wali->update([
            'nama_wali'     => $request->wali
        ]);

        return new WaliResource($wali);
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
        
        return new WaliResource($wali);
    }
}
