@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="user-table-content">
        <table class="table table-border">
            <tbody>
                <tr class="user-table">
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Картинка</th>
                </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->picture }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection