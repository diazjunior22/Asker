<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'estado',
        'capacidad',
        'imagen',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}

