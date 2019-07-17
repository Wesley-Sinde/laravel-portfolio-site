<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/kmjgxgoxyepk3ki22tvv9wrowx4vn30vy96tpaefvub1on59/tinymce/5/tinymce.min.js"></script>
    <script src="https://kit.fontawesome.com/c406f80329.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title> @yield('title') </title>
</head>
<body>

    @yield('content')

</body>
</html>
