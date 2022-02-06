@extends('layouts.app')

@section('styles')
<style>
    .job-container button{
        border: 1px solid gray;
        text-decoration: none;
        width: 300px;
        color: black;
    }
    .job-container button:hover{
        background-color: #e9ecef;
    }
    .view-container a{
        text-align: center;
        border: 1px solid gray;
        border-radius: 0.25rem;
        text-decoration: none;
        width: 300px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Добавление категории</h1>
    <form method="post" action="">
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
            <img
            style="height:100px;width:100px;margin-bottom: 10px;border: 2px solid grey;"
            src="">
            <input class="form-control" name="picture" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Добавить категорию</button>
    </form>
</div>
@endsection