@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Редактирование категории</h2>
                <form name="categories-form" method="post" action="{{ route('update-category', [$category->id]) }}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="mb-3">
                        <label for="category" class="form-label">Название</label>
                        <input name="name" type="text" class="form-control" id="category" value="{{old('name', $category->name)}}">
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

                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
@endsection
