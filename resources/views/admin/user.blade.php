@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('styles')
<style>
    #iter-user{
        text-align: center;
        border: 1px solid;
        border-radius: 8px;
        background-color: rgb(0 255 100 / 50%);
    }
    #iter-user:hover{
        background-color: rgb(0 255 100);
    }
</style>
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
                    <th>Email</th>
                    <th>Картинка</th>
                    <th>Войти</th>
                </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->picture }}</td>
                            <td>
                            <a id="iter-user" class="dropdown-item" href="{{ route('enterAsUser', $user->id) }}">Войти</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection