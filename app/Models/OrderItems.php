<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'orderitems';
    
    protected $fillable = ['quantity', 'order_id', 'pizzas_id'];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function pizzas()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'orderitem_has_extra', 'orderItems_id', 'extras_id');
    }
    
}
