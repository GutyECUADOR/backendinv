<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InversionResource;
use App\Http\Resources\TipoInversionResource;
use App\Models\TipoInversion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoInversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposInversiones = TipoInversion::all();
        return response([
            'tiposInversion'=> TipoInversionResource::collection($tiposInversiones),
            'message' => 'Lista de tipos obtenida'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|max:190',
            'tasa' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors(),
                'message' => 'Uno o más campos requeridos no pasaron la validación'
            ], 400);
        }

        $tipoInversion = TipoInversion::create($data);
        return response([
            'inversion' => new InversionResource($tipoInversion),
            'message' => 'Inversion registrada con éxito'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
