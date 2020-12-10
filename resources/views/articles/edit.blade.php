@extends('layouts.app')

@section('title', 'Редактировать статью ' .$article->title)

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
                <form method="POST" action="{{ route('article.update', $article) }}">
                    @csrf
                    @method('PATCH')
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <label for="user-title">Название</label>
                            <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="article-title">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Тело</label>
                            <input type="text" name="body" value="{{ $article->body }}" class="form-control" id="article-body">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Дата</label>
                            <input type="text" name="date" value="{{ $article->date }}" class="form-control" id="article-date">
                        </div>
                        <div class="form-group">
                            <label for="user-title">Автор</label>
                            <input type="text" name="author" value="{{ $article->author }}" class="form-control" id="article-author">
                        </div>

                        <button type="submit" class="btn btn-success">Отредактировать</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
