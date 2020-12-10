@extends('layouts.app')

@section('title', $user->login)

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Логин: {{ $user->login }}</h3>
            <h3>Имя пользователя: {{ $user->username }}</h3>
            <h3>Фамилия: {{ $user->surname }}</h3>
            <h3>Дата рождения: {{ $user->birthdate }}</h3>
            <h3>Email: {{ $user->email }}</h3>
            <h3>Адрес: {{ $user->address }}</h3>

        </div>
    </div>

@endsection
