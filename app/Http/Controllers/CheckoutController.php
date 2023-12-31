<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\Customer;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = session()->get('cart');

        return view('pizzaplaza.checkout')->with('cartItems', $cartItems);
    }

    public function processCheckout(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'street' => 'required|string',
            'streetnumber' => 'required|string',
            'zip' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cartItems = json_decode($request->input('cartItems'), true);
        $customer = new Customer([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'street' => $request->input('street'),
            'streetnumber' => $request->input('streetnumber'),
            'zip' => $request->input('zip'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
        ]);

        $customer->save();

        $order = Order::create(['customer_id' => $customer->id]);

        foreach ($cartItems as $cartItem) {           
            $orderItem = OrderItems::create([
                'order_id' => $order->id,
                'pizzas_id' => $cartItem['pizzas_id'],
                'quantity' => $cartItem['quantity'],
            ]);

            foreach ($cartItem['extras'] ?? [] as $extraItem) {
                $extra = Extra::find($extraItem);
                if ($extra) {
                    $orderItem->extras()->attach($extraItem['id']);
                }
            }
        }

        return redirect()->route('pizzaplaza.checkout.success', ['orderId' => $order->id]);
    }

    public function success($orderId)
    {
        $order = Order::find($orderId);
        
        if (!$order) {
            abort(404);
        }
    
        $orderItems = OrderItems::where('order_id', $orderId)->get();
        
        $pizzas = [];
        $extras = [];
        $pizzaPrice = [];
        $extraPrices = [];
        $pizzaQuantities = [];

        foreach ($orderItems as $orderItem) {

            $pizzas[] = $orderItem->pizzas; 
            $pizzaPrice[] = $orderItem->pizzas->price * $orderItem->quantity ; 

            $pizzaId = $orderItem->pizzas->id;

            if (array_key_exists($pizzaId, $pizzaQuantities)) {
                $pizzaQuantities[$pizzaId] += $orderItem->quantity;
            } else {
                $pizzaQuantities[$pizzaId] = $orderItem->quantity;
            }
    
            $extras[] = $orderItem->extras;

            $extrasForOrder = $orderItem->extras;
            foreach ($extrasForOrder as $extra) {
                if (isset($extra->price)) {
                    $extraPrices[] = $extra->price * $orderItem->quantity;
                }
            }
        
        }

        $totalPizzaPrice = array_sum($pizzaPrice);
        $totalExtraPrice = array_sum($extraPrices);
        $totalSum = $totalPizzaPrice + $totalExtraPrice;

        $shippingInfo = $order->customer; 
        $orderID = $order->id;

        session()->forget('cart');

        return view('pizzaplaza.success', [
            'order' => $order,
            'pizzas' => $pizzas,
            'quantity' => $pizzaQuantities,
            'extras' => $extras,
            'shippingInfo' => $shippingInfo,
            'orderID' => $orderID,
            'totalSum' => $totalSum,
        ]);
    }
    
}
