<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="dark">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Mycredly admin Panel</title>
    <!-- BEGIN: CSS Assets-->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @livewireStyles
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">

    {{ $slot }}

    <!-- BEGIN: JS Assets-->
    @livewireScripts
    <script src="{{asset('js/app.js')}}"></script>
    <!-- END: JS Assets-->
</body>

</html>
