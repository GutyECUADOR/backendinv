<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'monto',
        'fecha_inversion',
        'fecha_pago',
        'imagen_recibo',
        'user_id',
        'estado',
    ];

    protected $appends = ['dias_pago'];

    public function getDiasPagoAttribute()
    {
        $fecha_pago = Carbon::parse($this->fecha_pago);
        $fecha_inversion = Carbon::parse($this->fecha_inversion);
        return $fecha_pago->diffInDays($fecha_inversion);
    }
}
