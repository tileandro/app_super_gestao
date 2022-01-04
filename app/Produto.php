<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function unidade()
    {
        return $this->belongsTo('App\unidade');
    }

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }
}
