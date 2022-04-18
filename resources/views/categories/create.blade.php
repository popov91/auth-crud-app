@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Создание категории</h2>
                <form name="categories-form" method="post" action="{{url('categories')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Название</label>
                        <input name="name" type="text" class="form-control" id="category">
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
