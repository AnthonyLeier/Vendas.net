<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function cliente(){
    	return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    function produtos(){
    	return $this->belongsToMany('App\Produto', 'produtos_vendas', 'id_venda', 'id_produto')->withPivot(['id','quantidade', 'subtotal'])->withTimestamps();
    }
}
