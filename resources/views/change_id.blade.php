@extends('layout')
@section('title')
    Изменить
@endsection
@section('content')
    <div class="container">
        <h4 class="mb-3">Изменить</h4>
        <form class="needs-validation" novalidate="" method="post" action="/albums/public/create/check" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
                <div class="col-6">
                    <label for="firstName" class="form-label">Название</label>
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="{{$albums->name}}" value="{{$albums->name}}" required>
                </div>
                <div class="col-6">
                    <label for="username" class="form-label">Автор</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="author" name="author" placeholder="{{$albums->author}}" value="{{$albums->author}}" required>
                    </div>
                </div>
                <div class="col-12">
                    <label for="text" class="form-label">Описание </label>
                    <textarea type="text" class="form-control" id="descr" name="descr" placeholder="{{$albums->descr}}" value="{{$albums->descr}}"></textarea>
                </div>
                <div class="col-12">
                    <label for="text" class="form-label">Дата создания</label>
                    <p type="text" >{{$albums->updated_at}}</p>
                </div>
                <div class="col-md-5">
                    <label for="img" class="form-label">Выберите изображение</label>
                    <br>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <hr class="col-12">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить</button>
            </div>
        </form>

    </div>

@endsection
