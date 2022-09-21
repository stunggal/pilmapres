<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = kriteria::all();
        return view('kriteria.index', [
            'title' => "edit kriteria",
            'kriterias' => $kriterias,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kriteria $kriteria)
    {
        $d = $request->id;
        return $d;
        $validatedData = $request->validate([
            'nilai' => 'required',
            'biaya' => 'required',
            'materi' => 'required',
            'adab' => 'required',
        ]);
        $data = kriteria::where('id' 'd')->first();
        $data->update($validatedData);
        return redirect('/kriteria')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(kriteria $kriteria)
    {
        //
    }
}
