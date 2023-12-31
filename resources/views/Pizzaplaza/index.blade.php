@extends('layouts.pizza_plaza')

@section('main')

<div class="container-fluid bg-dark text-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-3 mb-4">Willkommen bei Pizza Plaza</h1>
                <p class="lead mb-5">Ihr fiktives Restaurant in Gießen/Langgöns</p>
                <a href="/order" class="btn btn-primary btn-lg">Start ordering</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card border-0 shadow p-4">
                <div class="card-body">
                    <p class="card-text">Herzlich willkommen auf unserer Webseite. Hier erfahren Sie mehr über unser Restaurant, Kontaktmöglichkeiten und bald können Sie auch online Bestellungen aufgeben.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
