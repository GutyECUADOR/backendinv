<?php

namespace App\Http\Controllers;

use App\Models\Inversion;
use Illuminate\Http\Request;

class InversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inversiones = Inversion::all();
        return view('dashboard', compact('inversiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function show(Inversion $inversion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inversion $inversion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inversion $inversion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inversion $inversion)
    {
        //
    }
}
