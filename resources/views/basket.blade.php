@extends('layouts.app')


@section('styles')
<style>
    .product-buttons {
        display: flex;
        justify-content: space-evenly;
        line-height: 37px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
            </tr>
        </thead>
        <tbody>
            @php
                $summ = 0;
            @endphp
            @forelse ($products as $product)
            
                
                <tr>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['price']}}</td>
                    <td class="product-buttons">
                        <form method="post" action="{{ route('removeProduct') }}">
                        @csrf
                            <input name='id' hidden value="{{ $product['id'] }}">
                            <button @empty($product['quantity']) disabled @endempty class="btn btn-danger">-</button>
                        </form>
                        {{ $product['quantity'] }}
                        <form method="post" action="{{ route('addProduct') }}">
                        @csrf
                            <input name='id' hidden value="{{ $product['id'] }}">
                            <button class="btn btn-success">+</button>
                        </form>
                    </td>
                    <td>
                        {{ $product['quantity']*$product['price'] }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">
                        Корзина пока пуста, начните <a href="{{route('home')}}">покупать!</a>
                    </td>
                </tr>
            @endforelse
                <tr>
                    <td colspan="3" class="text-end">Итого:</td>
                    <td>
                        <strong>
                        {{ $summ }}
                        </strong>
                    </td>
                </tr>
        </tbody>
    </table>
    @if ($products->count())
    <form method="post" action="{{ route('createOrder') }}">
        @csrf
        <label>Имя:</label>
        <p>
        <input name="name" class="form-control" value="{{ $name }}">
        <label>Адрес:</label>
        <p>
        <input name="address" class="form-control" value="{{ $mainAddress->address ?? '' }}">
        <p>
        <label>Почта:</label>
        <p>
        <input name="email" type="email" class="form-control" value="{{ $email }}">
        <p>
        <button class="btn btn-success">Сделать заказ</button>
    </form>
    @endif
</div>
@endsection