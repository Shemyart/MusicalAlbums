<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/albums/public/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Музыкальная библиотека</span>
    </a>

    <ul class="nav nav-pills">

        @if (Route::has('login'))

            <div class=" hidden fixed top-0 right-0 px-2 py-1 sm:block">
                @auth

                    <li class="nav-item"><a href="/albums/public/" class="nav-link active" aria-current="page">Главная</a></li>

                    <a class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">Выйти</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <li class="nav-item"><a href="#" class="nav-link"></a></li>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Войти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" >Регистрация</a>
                    @endif
                @endauth
            </div>
        @endif
        <li class="nav-item"><a href="#" class="nav-link"></a></li>
        <li class="nav-item"><a href="#" class="nav-link"></a></li>
    </ul>
</header>
   @yield('content')
<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
        <p class="text-center text-muted"> 2022 Shemyart</p>
    </footer>
</div>
</body>
</html>

