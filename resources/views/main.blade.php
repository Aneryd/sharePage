<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
</head>
<body>
    <h1>Главная страница</h1>

    <div>
        @auth
            <a href="{{ url("/profile", ["id" => auth()->user()->id ]) }}">Профиль</a>
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button>Выйти</button>
            </form>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Войти</a>

        {{-- @if (Route::has('register')) --}}
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Зарегистрироваться</a>
        {{-- @endif --}}
        @endguest
    </div>
</body>
</html>