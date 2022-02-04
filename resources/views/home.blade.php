@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('styles')
<style>
    .card-container {
        height: 350px;
    }
    .card{
        height: 100%;
    }
    .card-buton{
        text-align: center;
    }
    .card-img{
        height: 190px;
        width: 290px;
    }
    .card-img img{
        height: 190px;
    }
</style>
@endsection

@section('content')

<home-component></home-component>

<div class="container">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-3 mb-4 card-container">
            <div class="card" style="width: 18rem;">
                <div class="card-img">
                    <img src="{{asset('storage/img/categories')}}/{{$category->picture}}" class="card-img-top" alt="{{$category->picture}}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    {{$category->name}} ({{$category->products->count()}})
                    </h5>
                    <p class="card-text">
                    {{$category->description}}
                </div>
                <div class="card-buton">
                    <a href="{{route('category', $category->id)}}" class="btn btn-info">Перейти</a>
                </div>
                <p>
            </div>
        </div>            
        @endforeach
    </div>
</div>
@endsection