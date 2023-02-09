<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','animal_id','start','end','color','textColor'
    ];

    public function animal()
    {
        return $this->belongsTo('App\Models\Animal');
    }
}
