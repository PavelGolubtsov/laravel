@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="user-table-content">
        <table class="table table-border md-5">
            <tbody>
                <tr class="user-table">
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Описание</th>
                </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection