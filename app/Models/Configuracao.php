<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    protected $table = 'configuracoes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'chave' => 'string',
        'valor' => 'string',
        'descricao' => 'string'
    ];

    public $timestamps = [
        'created_at',
        'updated_at'
    ];
}
