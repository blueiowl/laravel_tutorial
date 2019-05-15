<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>@yield('header')</h1>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>