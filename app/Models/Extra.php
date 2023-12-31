<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $table = 'extras';

    protected $fillable = [
        'id', 'name', 'price', 'isChoosable' 
     ];

     public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_has_extra', 'extras_id', 'pizzas_id');
    }

}
