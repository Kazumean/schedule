<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: "Hiragino Kaku Gothic ProN","Hiragino Sans",Meiryo,sans-serif;
        margin-top: 10px !important;
    }
    </style>
    <title>Blog & Schedule</title>
</head>
<body>
    <div class="container">
        <h1 style="font-size:1.75rem;">Laravelシステム</h1>

        @yield('content')
        <div><a href="{{ url('./dashboard')}}">dashboard</a></div>
    </div>
</body>
</html>