@extends('layouts.app')

@section('styles')
<style>
    .view-container a{
        background-color: rgba(240,240,240, 0.5);
        padding: 6px 0 6px 40px;
        border: 1px solid gray;
        border-radius: 0.25rem;
        text-decoration: none;
        width: 300px;
    }
    span{
        vertical-align: middle;
        border: 1px solid;
        font-size: 8pt;
        border-radius: 20px;
        padding: 0 6px;
    }
    .job-container button{
        border: 1px solid gray;
        text-decoration: none;
        width: 300px;
        color: black;
        background-color: rgba(240,240,240, 0.5);
    }
    .job-container button:hover{
        background-color: rgba(240,240,240, 1);
    }
    .job-container button:hover{
        background-color: rgba(240,240,240, 1);
    }
</style>
@endsection

@section('content')
<div class="container">
    <div>
        <h1>Администраторская консоль</h1>
        <div class="view-container">
            <p>
            <a class="dropdown-item" href="{{ route('admin.user') }}"><span><b>i</b></span> {{ __('Список пользователей') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('admin.category') }}"><span><b>i</b></span> {{ __('Список категорий') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('admin.product') }}"><span><b>i</b></span> {{ __('Список продуктов') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('categoryCreated') }}"><b>&roarr;</b> {{ __('Добавить категорию') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('productCreated') }}"><b>&roarr;</b> {{ __('Добавить продукт') }}</a>
        </div>
        <p>
        @if (session('startExportCategories'))
            <div class="alert alert-success">
                Запущена выгрузка категорий!
            </div>
        @endif
        @if (session('startExportProducts'))
            <div class="alert alert-success">
                Запущена выгрузка продуктов!
            </div>
        @endif
        @if (session('startImportCategories'))
            <div class="alert alert-success">
                Запущена загрузка категорий!
            </div>
        @endif
        @if (session('startImportProducts'))
            <div class="alert alert-success">
                Запущена загрузка продуктов!
            </div>
        @endif
        <div class="job-container">
            <form method="post" action="{{ route('exportCategories') }}">
            @csrf
                <button type="submit" class="btn btn-link">Выгрузить категории &roarr; </button>
            </form>
            <p>
            <form method="post" action="{{ route('exportProducts') }}">
            @csrf
                <button type="submit" class="btn btn-link">Выгрузить продукты &roarr;</button>
            </form>
            <p>
            <form method="post" action="{{ route('importCategories') }}">
            @csrf
                <button type="submit" class="btn btn-link">Загрузить категории &loarr;</button>
            </form>
            <p>
            <form method="post" action="{{ route('importProducts') }}">
            @csrf
                <button type="submit" class="btn btn-link">Загрузить продукты &loarr;</button>
            </form>
        </div>
    </div>
</div>
@endsection