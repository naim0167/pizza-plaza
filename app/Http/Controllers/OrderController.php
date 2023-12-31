<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\View\Components\Article;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    
    public function order()
    {
        $articleComponent = new Article();

        $pizzas = $articleComponent->pizzas;
        
        return view('pizzaplaza.order')->with([
            'pizzas' => $pizzas,
        ]);

    }    
    
}
