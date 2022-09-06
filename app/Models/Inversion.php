<?php

namespace App\Models;

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
}
