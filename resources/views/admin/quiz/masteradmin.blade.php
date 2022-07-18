<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quiz/admin.css') }}" />
</head>
<body class="admin">

<?php $catnum = 0; ?>

@if (Route::has('login'))
@auth

<header>
<div class="container">
  <div class="row">
    <div class="col-md-6"><h2>Admin panel</h2></div>
    <div class="col-md-6 text-right" style="margin-top: 10px;">
    <a href="/logout">Log out</a> |
      <a target="_self" href="{{ url('/dashboard') }}">Dashboard</a>
    </div>
  </div>
</div>
</header>

<div class="leftMenu">
  <ul>
  <li class="intr"><a href="{{ route('admin/quiz/quiz.index') }}">Intro Page Content</a></li>
  <li class="quiz"><a href="{{ route('admin/quiz/quiz.admin') }}">Quiz Questions</a></li>
  </ul>
</div>

<div class="adminContent">
@yield('contentadmin')
</div>

<div id="deletecat" class="overlay">
    <div class="popup">
      Are you sure you want to delete <span class="catname"></span> category?
            <a class="yes" href="">YES</a>
            <a class="no" href="">NO</a>
    </div>
</div>

<div id="deletequest" class="overlay">
    <div class="popup">
      Are you sure you want to delete this question?
      <p class="questtitle" style="font-style:italic;"></p>
            <a class="yes" href="">YES</a>
            <a class="no" href="">NO</a>
    </div>
</div>

<script src="{{ asset('js/quiz/custom.js') }}"></script>

@else
  <div class="row">
    <div class="col-md-12 text-center" style="margin-top: 50px;">To see this page, please:
        <a href="{{ route('login') }}">Login</a> or
        <a href="{{ route('register') }}">Register</a>
      </div>
    </div>
@endauth
@endif


</body>
</html>
