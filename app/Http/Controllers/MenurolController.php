<?php

namespace App\Http\Controllers;

use App\Models\menurol;
use Illuminate\Http\Request;

class MenurolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $datos = request()->except('_token');
        menurol::insert($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menurol  $menurol
     * @return \Illuminate\Http\Response
     */
    public function show(menurol $menurol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menurol  $menurol
     * @return \Illuminate\Http\Response
     */
    public function edit(menurol $menurol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menurol  $menurol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menurol $menurol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menurol  $menurol
     * @return \Illuminate\Http\Response
     */
    public function destroy(menurol $menurol)
    {
        //
    }
}
