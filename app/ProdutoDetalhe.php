<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

    public function unidade()
    {
        return $this->belongsTo('App\Unidade');
    }
}
