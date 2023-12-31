@extends('layouts.pizza_plaza')

@section('main')

    <div class="container mt-5">
        @if((is_null($cartItems) === false) && ($cartItems > 0))
            <h1>Cart Details</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Extras</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['pizza_name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['pizza_price'] ?? 0 }}</td>
                            <td>
                                @if(isset($item['extras']) && !empty($item['extras']))
                                    @foreach($item['extras'] as $extra)
                                        {{ $extra['name'] }} - €{{ $extra['price'] }}<br>
                                    @endforeach
                                @else
                                    No extras added<br>
                                @endif
                            </td>
                            <td>€{{ $item['pizza_with_total_extra_price'] ?? 0}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Final Price:</strong></td>
                    <td><strong>€{{ $totalSum }}</strong></td>
                </tr>

            </table>

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Clear Cart</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('checkout') }}" class="btn btn-warning btn-block">Proceed to Checkout</a>
                </div>
            </div>
            
        @else
            <div class="empty-cart-message">
                <h1 style="text-align: center; color: #555; font-family: 'Arial', sans-serif; margin-bottom: 20px;">Your cart is empty.</h1>
                <p style="text-align: center; font-size: 18px; color: #777; font-family: 'Arial', sans-serif;">Explore our delicious pizzas and add some to your cart!</p>
            </div>
        @endif
    </div>
@endsection
