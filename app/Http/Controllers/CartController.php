<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $pizza = Pizza::find($request->input('pizza'));
        $selectedExtras = $request->input('extras');        
        $totalExtrasPrice = 0;
        $selectedExtrasDetails = [];

        foreach ($selectedExtras ?? [] as $extraId) {
            $extra = Extra::find($extraId);
            
            $totalExtrasPrice += $extra->price;
    
            $selectedExtrasDetails[] = [
                'id' => $extra->id,
                'name' => $extra->name,
                'price' => $extra->price
            ];
        }
        $cartItem = [
            'pizzas_id' => $pizza->id,
            'pizza_name' => $pizza->name,
            'quantity' => $request->input('quantity'),
            'extras' => $selectedExtrasDetails,
            'pizza_price' => $pizza->price,
            'total_extras_price' => $totalExtrasPrice,
            'pizza_with_total_extra_price' => ($pizza->price + $totalExtrasPrice) * $request->input('quantity')
        ];

        $cart = session()->has('cart') ? session()->get('cart') : [];
    
        $cart[] = $cartItem;
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.show');
    }
    

    public function showCart()
    {
        $cartItems = session()->get('cart');

        $totalSum = 0;
        if ($cartItems) {
            foreach ($cartItems as $item) {
                $totalSum += $item['pizza_with_total_extra_price'];
            }
        }
    
        return view('pizzaplaza.cart', [
            'cartItems' => $cartItems,
            'totalSum' => $totalSum
        ]);
    }
    

}
