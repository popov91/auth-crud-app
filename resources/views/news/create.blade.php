@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Создание новости</h2>
                <form name="categories-form" method="post" action="{{url('news')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="category_id">Категория</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <label for="title" class="form-label">Заголовок</label>
                        <input name="title" type="text" class="form-control" id="title">

                        <label for="text">Текст</label>
                        <textarea name="text" class="form-control" id="text" rows="3"></textarea>

                        <input name="author_id" type="hidden" value="{{Auth::user()->id}}">
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
