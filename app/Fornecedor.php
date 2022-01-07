<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    protected $table = 'fornecedor';
    protected $fillable = ['nome', 'email', 'uf'];

    public function produtos()
    {
        return $this->hasMany('App\Produto', 'fornecedor_id', 'id');
    }
}
