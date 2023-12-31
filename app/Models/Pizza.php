<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';

    protected $fillable = [
       'id', 'name', 'price', 'description' 
    ];

    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'pizza_has_extra', 'pizzas_id', 'extras_id');
    }

}
