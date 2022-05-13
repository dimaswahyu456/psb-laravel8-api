<?php

namespace App\Http\Controllers;

use App\Models\Wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wali = Wali::all();
        $data = ['wali' => $wali];
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $wali = new Wali();
        $wali->wali = $request->wali_guru;
        $wali->save();

        return "Data Tersimpan";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Wali $wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Wali $wali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $wali = Wali::find($id);
        $wali->wali_guru = $request->wali_guru;
        $wali->save();

        return "Data Terupdate";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $wali = Wali::find($id);
        $wali->delete();

        return "Data Terhapus";
    }

    public function detail($id)
    {
        //
        $wali = Wali::find($id);

        return $wali;
    }
}
