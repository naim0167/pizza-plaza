<?php

namespace App\View\Components;

use App\Models\Extra;
use Illuminate\View\Component;
use App\Models\Pizza;

class Article extends Component
{
    public $pizzas;

    public function __construct()
    {
        $this->pizzas = Pizza::with('extras')->select('id', 'name', 'price', 'description')->get();        
    }

    public function render()
    {

        return view('components.article');
    }
}
