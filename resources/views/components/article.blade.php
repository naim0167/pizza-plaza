<div class="container mt-5">
    <h1 class="text-center mb-4">Online Order</h1>
    <div class="row">
        @foreach($pizzas as $pizza)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $pizza->name }} - €{{ $pizza->price }}</h2>
                        <p class="card-text">{{ $pizza->description }}</p>
                        <hr>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf

                            <input type="hidden" name="pizza" value="{{ $pizza->id }}">

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1">
                            </div>

                            <div class="form-group">
                                <h3>Extra Toppings</h3>
                                @foreach($pizza->extras as $extra)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="extras[]" value="{{ $extra->id }}">
                                        <label class="form-check-label">{{ $extra->name }} - €{{ $extra->price }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
