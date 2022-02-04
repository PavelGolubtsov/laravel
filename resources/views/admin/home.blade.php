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
    <div>
        <h1>Администраторская консоль</h1>
        <div class="view-container">
            <p>
            <a class="dropdown-item" href="{{ route('admin.user') }}">{{ __('Список пользователей') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('admin.category') }}">{{ __('Список категорий') }}</a>
            <p>
            <a class="dropdown-item" href="{{ route('admin.product') }}">{{ __('Список продуктов') }}</a>
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
                <button type="submit" class="btn btn-link">Выгрузить категории</button>
            </form>
            <p>
            <form method="post" action="{{ route('exportProducts') }}">
            @csrf
                <button type="submit" class="btn btn-link">Выгрузить продукты</button>
            </form>
            <p>
            <form method="post" action="{{ route('importCategories') }}">
            @csrf
                <button type="submit" class="btn btn-link">Загрузить категории</button>
            </form>
            <p>
            <form method="post" action="{{ route('importProducts') }}">
            @csrf
                <button type="submit" class="btn btn-link">Загрузить продукты</button>
            </form>
        </div>
    </div>
</div>
@endsection