@extends('layouts.app')

@section('title', 'Добавить статью')

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
                <form method="POST" action="{{ route('article.store') }}">
                    @csrf
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <label for="article-title">Название статьи</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="article-title">
                        </div>
                        <div class="form-group">
                            <label for="article-body">Тело</label>
                            <textarea type="text" name="body"  class="form-control" id="article-body">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="article-date">Дата</label>
                            <input type="text" name="date" value="<?php $today= date("d.m.y"); echo $today ?>" class="form-control" id="article-date">
                        </div>
                        <div class="form-group">
                            <label for="article-author">Автор</label>
                            <input type="text" name="author" value="{{ old('author') }}" class="form-control" id="article-author">
                        </div>
{{--                        --}}


                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
