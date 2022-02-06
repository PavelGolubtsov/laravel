@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавление категории</h1>
    @if (session()->has('addCategories'))
            <div class="alert alert-success text-center">
                Категория успешно добавлена!
            </div>
        @endif
    <form method="post" action="{{ route('addCategories') }}" enctype="multipart/form-data">
    @csrf
        <label class="form-label">Имя</label>
        <div class="mb-3">
            <input class="form-control" type="text" name="name" value="">
        </div>
        <label class="form-label">Описание</label>
        <div class="mb-3">
            <input class="form-control" type="text" name="description" value="">
        </div>
        <label class="form-label">Изображение</label>
        <div class="mb-3">
            <input class="form-control" type="file" name="picture">
        </div>
        <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
</div>
@endsection