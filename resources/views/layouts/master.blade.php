<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <script src="/js/app.js" defer></script>
</head>
<body>
    <div class="text-center">
        <h1>@yield('header')</h1>
        <h4>@yield('subheader')<h4>
    </div>
    @yield('content')
</body>
</html>
