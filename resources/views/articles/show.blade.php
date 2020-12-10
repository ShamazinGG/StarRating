@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="card">
        <div class="card-body">

            <h3>Название: {{ $article->title }}</h3>
            <hr>
            <h3>Тело: {{ $article->body }}</h3>
            <hr>
            <h3>Дата: <?php $today= date("d.m.y"); echo $today ?></h3>
            <hr>
            <h3>Автор: {{ $article->author }}</h3>
            <hr>


        </div>
        <form action="{{ route('articles.rating', $article->id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">Поставьте рейтинг статье:</h3>
                        <div class="rating">
                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                   data-step="1" data-size="xs">
                            <input type="hidden" name="id" required="" value="{{ $article->id }}">
                            <br/>
                            <button class="btn btn-success">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </form>



    <script type="text/javascript">
        $("#input-id").rating();
    </script>
    </div>

@endsection

