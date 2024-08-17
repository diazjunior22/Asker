<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;
// En el modelo Pedido.php
protected $dates = ['fecha']; // O usa $casts si prefieres

    protected $fillable = [
        'fecha',
        'estado',
        'total',
        'id_mesa',
        // 'id_cliente',
        'id_usuario',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }



    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

  

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }


    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
    



}