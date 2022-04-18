@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Auth::check())
                <a href="{{ url('/news/create') }}">Добавить новость</a><br>
            @endif
        @foreach($news as $item)
                <div class="card">
                    <div class="card-header">
                        {{$item->category->name}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <h2>{{$item->title}}</h2>
                            <p>{{$item->text}}</p>
                        </blockquote>
                        <p class="card-text"><small class="text-muted"> Автор: {{$item->author->email}}</small></p>

                        @if(Auth::check() && Auth::user()->id === $item->author_id)
                            <a href="/news/{{$item->id}}/edit">Редактировать</a><br>
                        @endif

                        @if(Auth::check() && Auth::user()->id === $item->author_id || Auth::check() && Auth::user()->isAdmin())
                        <a href="/news/{{$item->id}}/delete">Удалить</a><br>
                        @endif
                    </div>
                </div>
                <br>
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection
