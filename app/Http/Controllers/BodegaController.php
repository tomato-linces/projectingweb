<?php

namespace App\Http\Controllers;

use App\bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodegas = bodega::all();
        return $bodegas;
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
     * @param  \App\almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function show(almacenes $almacenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function edit(almacenes $almacenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, almacenes $almacenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\almacenes  $almacenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(almacenes $almacenes)
    {
        //
    }
}
