@extends('layouts.pizza_plaza')

@section('main')
    <div class="container mt-5">
        <h1>Checkout</h1>
        @if(empty($cartItems) || $cartItems === null)
        <div class="empty-cart-message">
            <p>Your cart is empty. Please add items before proceeding to checkout.</p>
            <a href="{{ route('order') }}" class="btn btn-secondary">Go to Order</a>
        </div>
       @else
        <div class="checkout-form">
            <form method="post" action="{{ route('checkout.process') }}">
                @csrf

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control">
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" name="street" value="{{ old('street') }}" class="form-control">
                    @error('street')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="streetnumber">Street Number</label>
                    <input type="text" name="streetnumber" value="{{ old('streetnumber') }}" class="form-control">
                    @error('streetnumber')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="zip">ZIP Code</label>
                    <input type="text" name="zip" value="{{ old('zip') }}" class="form-control">
                    @error('zip')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <input type="hidden" name="cartItems" value="{{ json_encode($cartItems) }}">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </form>
        </div>
        @endif
    </div>
@endsection
