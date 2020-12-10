@extends('layouts.app')

@section('title', 'Редактировать пользователя' .$user->login)

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
                <form method="POST" action="{{ route('user.update', $user) }}">
                    @csrf
                    @method('PATCH')
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <label for="user-title">Логин</label>
                            <input type="text" name="login" value="{{ $user->login }}" class="form-control" id="user-login">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Имя пользователя</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control" id="user-username">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Фамилия</label>
                            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control" id="user-surname">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Дата рождения</label>
                            <input type="text" name="birthdate" value="{{ $user->birthdate }}" class="form-control" id="user-birthdate">
                        </div>
                        <div class="form-group">
                            <label for="user-title">email</label>
                            <input type="text" name="email" value="{{ $user->email  }}" class="form-control" id="user-email">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Адрес</label>
                            <input type="text" name="address" value="{{ $user->address }}"class="form-control" id="user-address">
                        </div>


                        <button type="submit" class="btn btn-success">Отредактировать</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
