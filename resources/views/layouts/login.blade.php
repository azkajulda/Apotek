<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apotek</title>
    <link rel="shortcut icon" href="{{asset('/images/apotik.png')}}" type="image/x-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
@yield('title')
<div class="main" style="padding: 20px!important;">
    <!-- Login dan regist -->
    @yield('content')
</div>

<!-- JS -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
