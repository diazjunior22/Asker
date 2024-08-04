<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'descripcion',
        'precio',
        'cantidad',
        'id_categoria',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}