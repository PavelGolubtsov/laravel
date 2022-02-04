@extends('layouts.app')

@section('styles')
<style>
    .product-price {
        border-bottom: 1px solid grey;
        font-size: 23px;
        text-align: center;
        margin-bottom: 10px;
    }
    .card-text {
        height: 46px;
    }
    .product-buttons {
        display: flex;
        justify-content: center;
        line-height: 37px;
    }
    .btn{
        margin: 0 10px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h3> ID категории: {{ $category->id }} </h3>
    <h3> Название категории: {{ $category->name }} </h3>

    <div class="row">
    @foreach ($category->products as $product)
    <div class="col-3 mb-4">
        <div class="card" style="width: 18rem;">
        <img src="{{asset('storage/img/products')}}/{{$product->picture}}" class="card-img-top" alt="{{$product->picture}}">
            <div class="card-body">
                <h5 class="card-title">
                {{$product->name}}
                </h5>
                <p class="card-text">
                {{$product->description}}
                </p>
            </div>
            <div class="product-buttons">
                <form method="post" action="{{ route('removeProduct') }}">
                    @csrf
                    <input name='id' hidden value="{{ $product->id }}">
                    <button @empty(session("cart.$product->id")) disabled @endempty class="btn btn-danger">-</button>
                </form>
                {{ session("cart.$product->id") ?? 0 }}
                <form method="post" action="{{ route('addProduct') }}">
                    @csrf
                    <input name='id' hidden value="{{ $product->id }}">
                    <button class="btn btn-success">+</button>
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                Цена: {{$product->price}} руб.
                </h5>
            </div>
        </div>
    </div>
    @endforeach
    </ul>
</div>
@endsection