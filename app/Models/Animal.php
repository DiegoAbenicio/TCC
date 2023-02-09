<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'dono_id', 'tipodepelo', 'raca', 'descricao', 'especie'
    ];

    public function dono(){
        return $this->belongsTo('App\Models\Cliente');
    }

}
