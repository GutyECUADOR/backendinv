<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InversionResource;
use App\Models\Inversion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuser = Auth::user();
        $inversiones = Inversion::where('user_id', $currentuser->id)->orderBy('fecha_inversion', 'desc')->get();
        return response([
            'inversiones'=> InversionResource::collection($inversiones),
            'message' => 'Lista de inversiones obtenida'
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
            'tipo' => 'required|max:255',
            'monto' => 'required|int',
            'fecha_pago' => 'date|nullable',
            'imagen_recibo' => 'required',
            'estado' => 'required|max:255',
            
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors(),
                'message' => 'Uno o más campos requeridos no pasaron la validación'
            ], 400);
        }

        //$filename = basename($request->file('imagen_recibo')->store('public/recibos'));
        $filename_unique = Str::random(40);
        $filename = Storage::put('public/recibos/'.$filename_unique.'.jpg', base64_decode($data['imagen_recibo']));
        
        $data['imagen_recibo'] = $filename_unique.'.jpg';

        $currentuser = Auth::user();
        $data['user_id'] = $currentuser->id;

        $data['fecha_inversion'] = Carbon::now();

        // Fecha de pago autocalculada
        switch ($data['tipo']) {
            case 'VIP2':
                $add_days = 30;
                break;
            
            case 'VIP1':
                $add_days = 60;
                break;
            
            default:
                $add_days = 90;
                break;
        }

        $data['fecha_pago'] = Carbon::now()->addDays($add_days);
       
        $inversion = Inversion::create($data);
        return response([
            'inversion' => new InversionResource($inversion),
            'message' => 'Inversion registrada con éxito'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function show(Inversion $inversion)
    {
        return response([
            'inversion' => new InversionResource($inversion),
            'message' => 'Inversion Obtenida'
        ], 200);
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
        $inversion->update($request->all());
        return response([
            'inversion' => new InversionResource($inversion),
            'message' => 'Inversion actualizada con éxito'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inversion  $inversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inversion $inversion)
    {
        $inversion->delete();
        return response([
            'message' => 'Inversion eliminada con éxito'
        ], 200);
    }
}
