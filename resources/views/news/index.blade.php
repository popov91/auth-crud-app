@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ url('/news/create') }}">Добавить новость</a><br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->author->name}}</td>
                            <td>
                                <a href="/news/{{$item->id}}/delete">Удалить</a><br>
                            </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
