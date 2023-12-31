@extends('layouts.pizza_plaza')

@section('main')
    <div class="container mt-5">
        <h1>Order Successful!</h1>
        
        <p>Thank you for your order. Here are the details:</p>
        
        <ul>

            @foreach($pizzas as $index => $pizza)
                <li>
                    @if($pizza)
                        <strong>Item:</strong> {{ $pizza->name }}<br>
                        {{-- <strong>Quantity:</strong> {{ $quantity }}<br> --}}
                        <strong>Price per item:</strong> €{{ $pizza->price }}<br>
                        @if($extras[$index]->isNotEmpty())
                            <strong>Extras:</strong><br>
                            <ul>
                                @foreach($extras[$index] as $extra)
                                    <li>{{ $extra->name }} (+€{{ $extra->price }})</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                    @else
                        <strong>Item:</strong> N/A<br>
                    @endif
                </li>
            @endforeach
        </ul>
        
        <p><strong>Total Amount:</strong> €{{ $totalSum }}</p>
        
        <p><strong>Shipping Information:</strong></p>
        <ul>
            <li><strong>Name:</strong> {{ $shippingInfo->firstname }} {{ $shippingInfo->lastname }}</li>
            <li><strong>Address:</strong> {{ $shippingInfo->street }}, {{ $shippingInfo->streetnumber }}, {{ $shippingInfo->zip }}, {{ $shippingInfo->city }}</li>
            <li><strong>Phone:</strong> {{ $shippingInfo->phone }}</li>
        </ul>
        
        <p><strong>Order ID:</strong> {{ $orderID }}</p>
                
        <p>For any inquiries regarding your order, please contact our support.</p>
    </div>
@endsection
