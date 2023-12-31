@extends('layouts.pizza_plaza')

@section('main')
    <x-article />

    <div class="container my-5">
        @if(session('cart'))
            <div class="alert alert-success text-center">
                Pizza has been Added!
            </div>
        @endif

        <table class="table table-hover mt-3 text-center" id="myTable">
        </table>
    </div>
@endsection
