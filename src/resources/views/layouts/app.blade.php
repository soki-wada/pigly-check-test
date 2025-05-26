<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header-inner">
            <h1 class="header-logo">
                PiGLy
            </h1>
            <div class="header-button">
                <div class="header-button-wrapper">
                    <a href="/weight_logs/goal_setting" class="header-button-item">
                        目標体重設定
                    </a>
                </div>
                <div class="header-button-wrapper">
                    <form action="{{route('logout')}}" class="header-form" method="post">
                        @csrf
                        <button class="header-button-item" type="submit">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>