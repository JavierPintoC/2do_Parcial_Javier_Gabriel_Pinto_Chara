<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Silla extends Model
{
    use HasFactory;

    protected $table = 'sillas'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'Material',
        'Dimenciones',
        'Peso',
        'Uso',
        // Si usas timestamps, no es necesario incluir created_at y updated_at
    ];

    //public $timestamps = true; 
}
