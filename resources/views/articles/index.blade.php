@extends('layouts.app')

@section('title', 'Страница со статьями')

@section('content')
    <a href="{{ route('article.create') }}" class="btn btn-success">Создать статью</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">


    <table class="table mt-3"  >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Тело статьи</th>
            <th scope="col">Дата</th>
            <th scope="col">Автор статьи</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
                <td><?php $today= date("d.m.y"); echo $today ?></td>
                <td>{{ $article->author }}</td>



                <td class="table-buttons">
                    <a href="{{ route('article.show', $article) }}" class="btn btn-success">Показать</a>
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Редактировать</a>
                    <form method="post" action =  "{{ route('article.destroy', $article) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    </div>
    </div>

{{--    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>--}}
{{--    <script>--}}
{{--        var ratedIndex = -1, uID = 0;--}}

{{--        $(document).ready(function () {--}}
{{--            resetStarColors();--}}

{{--            if (localStorage.getItem('ratedIndex') != null) {--}}
{{--                setStars(parseInt(localStorage.getItem('ratedIndex')));--}}
{{--                uID = localStorage.getItem('uID');--}}
{{--            }--}}

{{--            $('.fa-star').on('click', function () {--}}
{{--                ratedIndex = parseInt($(this).data('index'));--}}
{{--                localStorage.setItem('ratedIndex', ratedIndex);--}}
{{--                saveToTheDB();--}}
{{--            });--}}

{{--            $('.fa-star').mouseover(function () {--}}
{{--                resetStarColors();--}}
{{--                var currentIndex = parseInt($(this).data('index'));--}}
{{--                setStars(currentIndex);--}}
{{--            });--}}

{{--            $('.fa-star').mouseleave(function () {--}}
{{--                resetStarColors();--}}

{{--                if (ratedIndex != -1)--}}
{{--                    setStars(ratedIndex);--}}
{{--            });--}}
{{--        });--}}

{{--        function saveToTheDB() {--}}
{{--            $.ajax({--}}
{{--                url: "stars.php",--}}
{{--                method: "POST",--}}
{{--                dataType: 'json',--}}
{{--                data: {--}}
{{--                    save: 1,--}}
{{--                    uID: uID,--}}
{{--                    ratedIndex: ratedIndex--}}
{{--                }, success: function (r) {--}}
{{--                    uID = r.id;--}}
{{--                    localStorage.setItem('uID', uID);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        function setStars(max) {--}}
{{--            for (var i=0; i <= max; i++)--}}
{{--                $('.fa-star:eq('+i+')').css('color', 'green');--}}
{{--        }--}}

{{--        function resetStarColors() {--}}
{{--            $('.fa-star').css('color', 'white');--}}
{{--        }--}}
{{--    </script>--}}






    {{$articles->links("pagination::bootstrap-4 ")}}

@endsection







