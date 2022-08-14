<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport",
            content="width=device-width,user-scalable=no,
            initial-scale=1.0,
            maximum-scale=1.0,
            minmum-scale=1.0">
    <meta http-equiv="S-UA-Compatible" content="ie=edge">

    <!--LaravelMix ｃｓｓ読込-->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <!--LaravelMix JavaScript読込-->
    <script src = "{{ mix('/js/app.js') }}"></script>

    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
</head>
<body class = "bg-gray-50">
    {{ $slot }}
</body>
</html>
