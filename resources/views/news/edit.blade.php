@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Редактирование новости</h2>
                <form name="news-form" method="post" action="{{route('update-news', [$news->id])}}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="mb-3">
                        <label for="category_id">Категория</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>

                        <label for="title" class="form-label">Заголовок</label>
                        <input name="title" type="text" class="form-control" id="title"
                               value="{{old('title', $news->title)}}">

                        <label for="text">Текст</label>
                        <textarea name="text" class="form-control" id="text" rows="10"
                        >{{old('text', $news->text)}}</textarea>
                        <input name="author_id" type="hidden" value="{{$news->author->id}}">
                    </div>

                    @if (count($errors) > 0)
                        <div class="error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <p class="text-danger">{{ $error }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
@endsection
