
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
        @include('head',['path' => '/'])
</head>
<body>

    @include('menu',['path' => '/'])

    @yield('content')




     @include('footer',['path' => '/'])
</body>
</html>
