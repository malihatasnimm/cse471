@extends('frontend.layouts.main')

@section('main-container')
    @if($products->isEmpty())
        <p>No products found</p>
    @else
        <div class="products-list">
            @foreach($products as $product)
                <div class="product-item">
                    
                    <img src="{{ asset('frontend/img/product/' . $product->image) }}" alt="{{ $product->name }}">

                    <h3>{{ $product->name }}</h3>
                    <p>${{ $product->price }}</p>
                    <a href="{{ route('add.to.cart', $product->id) }}">Add to Cart</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
