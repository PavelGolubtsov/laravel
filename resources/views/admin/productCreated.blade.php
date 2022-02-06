@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавление продукта</h1>
    @if (session()->has('addProducts'))
            <div class="alert alert-success text-center">
                Продукт успешно добавлен!
            </div>
        @endif
    <form method="post" action="{{ route('addProducts') }}" enctype="multipart/form-data">
    @csrf
        <label class="form-label">Имя</label>
        <div class="mb-3">
            <input class="form-control" type="text" name="name" value="">
        </div>
        <label class="form-label">Описание</label>
        <div class="mb-3">
            <input class="form-control" type="text" name="description" value="">
        </div>
        <label class="form-label">Цена</label>
        <div class="mb-3">
            <input class="form-control" type="text" name="price" value="">
        </div>
        <label class="form-label">Изображение</label>
        <div class="mb-3">
            <input class="form-control" type="file" name="picture">
        </div>
        <label class="form-label">ID категории</label>
        <div class="mb-3">
            <input class="form-control" type="number" name="category_id" value="">
        </div>
        <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
</div>
@endsection