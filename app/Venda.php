<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
	use SoftDeletes;
	
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function cliente(){
    	return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    function produtos(){
    	return $this->belongsToMany('App\Produto', 'produtos_vendas', 'id_venda', 'id_produto')->withPivot(['id','quantidade', 'subtotal'])->withTimestamps();
    }
}
