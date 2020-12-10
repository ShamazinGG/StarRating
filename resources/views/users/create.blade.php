@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                    <div class="form-group">
                        <label for="user-title">Логин</label>
                        <input type="text" name="login" value="{{ old('login') }}" class="form-control" id="user-login">
                    </div>
                    <div class="form-group">
                        <label for="user-title">email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="user-email">
                    </div>
                    <div class="form-group">
                        <label for="user-password">Пароль</label>
                        <input type="text" name="password" value="{{ old('password') }}" class="form-control" id="user-password">
                    </div>
                    <div class="form-group">
                        <label for="user-title">Имя пользователя</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="user-username">
                    </div>
                    <div class="form-group">
                        <label for="user-title">Фамилия</label>
                        <input type="text" name="surname" value="{{ old('surname') }}" class="form-control" id="user-surname">
                    </div>
                    <div class="form-group">
                        <label for="user-title">Дата рождения</label>
                        <input type="text" name="birthdate" value="{{ old('birthdate') }}" class="form-control" id="user-birthdate">
                    </div>

                    <div class="form-group">
                        <label for="user-title">Адрес</label>
                        <input type="text" name="address" value="{{ old('address') }}"class="form-control" id="user-address">
                    </div>


                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>

    </div>
    </div>
@endsection
