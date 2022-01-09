@extends('layout')
@section('title')
    Музыкальные альбомы
@endsection
@section('content')
    <div class="album py-5">
        <div class="container">
            <a href="/albums/public/create" class="btn btn-primary my-2">Добавить</a>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($albums as $elem)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="15%" src="{{$elem->file}}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                            <div class="card-body">
                                <h3 class="card-text">{{$elem->name}}</h3>
                                <p class="card-text">{{$elem->descr}}</p>
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="button-group">
                                        <a  href="{{ route('change', $elem->id) }}" class="btn btn-sm btn-outline-secondary" value="{{$elem->id}}">Изменить</a>
                                        <a  href="{{ route('delete', $elem->id) }}" class="btn btn-sm btn-outline-secondary" value="{{$elem->id}}">Удалить</a>
                                    </div>
                                    <p class="text-muted">{{$elem->author}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
