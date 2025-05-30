<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    @yield('css')
</head>

<body>
    <main>
        <div class="user-content">
            <h2 class="content-logo">
                PiGLy
            </h2>
            @yield('content')
        </div>
    </main>
</body>

</html>