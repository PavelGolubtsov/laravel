@extends('layouts.app')

@section('content')
<div class="container">
<h1>Test</h1>
@foreach ($category->products as $product)
            <li>
                {{$product->name}}, {{$product->price}}
            </li>
        @endforeach
</div>
@endsection