<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model

{
    protected $table = 'locacoes';
    
    protected $fillable = [
        'data_locacao',
        'data_retorno',
        'desconto',
        'produto_id',
        'cliente_id'
    ];
}
