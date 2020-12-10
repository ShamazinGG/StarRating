@extends('layouts.app')

@section('title', 'Страница с пользователями')

@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-success">Создать пользователя</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
        @endif

    <table class="table mt-3"  >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Логин</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Дата Рождения</th>
            <th scope="col">email</th>
            <th scope="col">Адрес</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->login }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->birthdate }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td>
            <td class="table-buttons">
                <a href="{{ route('user.show', $user) }}" class="btn btn-success">Показать</a>
                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Редактировать</a>
                <form method="post" action =  "{{ route('user.destroy', $user) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

        {{$users->links("pagination::bootstrap-4 ")}}

@endsection

