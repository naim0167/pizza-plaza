<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaPlazaController extends Controller
{
    public function index()
    {
        return view('pizzaplaza.index');
    }

    public function about()
    {
        return view('pizzaplaza.about');
    }

    public function contact()
    {
        return view('pizzaplaza.contact');
    }

    public function imprint()
    {
        return view('pizzaplaza.imprint');
    }

    // public function order()
    // {
    //     $pizzas = Pizza::all();
        
    //     return view('pizzaplaza.order', [
    //         'pizzas' => $pizzas
    //     ]);
    // }
}
