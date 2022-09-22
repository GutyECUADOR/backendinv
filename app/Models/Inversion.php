<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tasa',
        'dias_inversion',
        'monto',
        'monto_recibir',
        'fecha_inversion',
        'fecha_pago',
        'imagen_recibo',
        'user_id',
        'estado',
        'observacion'
    ];

    protected $appends = ['dias_pago'];

    public function getDiasPagoAttribute()
    {
        $fecha_pago = Carbon::parse($this->fecha_pago);
        $hoy = Carbon::now();
        return $fecha_pago->diffInDays($hoy);
    }
}
