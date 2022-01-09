@extends('layout')
@section('title')
    Добавить
@endsection
@section('content')
<div class="container">
        <h4 class="mb-3">Добавить альбом</h4>
        <form class="needs-validation" novalidate="" method="post" action="/albums/public/create/check" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
                <div class="col-6">
                    <label for="firstName" class="form-label">Название</label>
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Введите название альбома" value="" required>
                </div>
                <div class="col-6">
                    <label for="username" class="form-label">Автор</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="author" name="author" placeholder="Введите автора" required>
                    </div>
                </div>
                <div class="col-12">
                    <label for="text" class="form-label">Описание </label>
                    <textarea type="text" class="form-control" id="descr" name="descr" placeholder="Описание"></textarea>
                </div>

            <hr class="col-12">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить</button>
            </div>
        </form>

</div>

@endsection
