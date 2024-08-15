<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'mesa_id',
        'usuario_id', // o 'session_id', según lo que uses
        'producto_id',
        'precio',
        'cantidad',
        'nota',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function usuario()
{
    return $this->belongsTo(User::class, 'usuario_id');
}

public function mesa()
{
    return $this->belongsTo(Mesa::class, 'mesa_id');
}




}


