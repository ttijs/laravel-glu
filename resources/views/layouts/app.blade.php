<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo env('APP_NAME') ?> - @yield('title') </title>
    <link rel="stylesheet" href="<?= asset('/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= asset('/css/app.css'); ?>">
</head>
<body>

<div class="container">
{{--    @yield('header', View::make('layouts.header'))--}}
    @yield('menu', View::make('layouts.menu'))
    @yield('content')
</div>

</body>
</html>
