<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    

    @include('website.layout.header')

    <style>
        a{text-decoration: none}
    </style>
</head>
<body dir="{{(Config::get('app.locale') == 'en' ? 'ltr' :'rlt' )}}">

    @include('website.layout.navbar')
    @yield('content')



    @include('website.layout.footer')
    @include('website.layout.footer_script')
</body>
</html>