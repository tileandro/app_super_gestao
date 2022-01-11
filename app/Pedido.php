<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'pedido_produtos')->withPivot('quantidade', 'created_at', 'updated_at');
    }
}
