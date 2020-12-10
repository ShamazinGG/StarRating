@extends('layouts.app')
@section('title', 'Страница авторизации')
@section('content')
<div class="container">
<h1>Самая главная страница</h1>
    <header>

        <a href="/login" class="btn btn-primary">Войти</a>
       <a href="/user/create" class="btn btn-primary">Зарегистрироваться</a>

    </header>
</div>

@endsection
