@extends('layouts.app')
<!-- layouts/app.blade.php -->
<html>
<head>
    <title>StackOverflow</title>
    <!-- Stylesheets, scripts, etc. -->
</head>
<body>
<nav>
    <!-- Navigation links -->
</nav>
<main class="container">
    @yield('content')
    @section('content')
        <h1>{{ $question->title }}</h1>
        <p>{{ $question->body }}</p>
        <!-- Other details about the question -->
    @endsection

</main>
<footer>
    <!-- Footer content -->
</footer>
</body>
</html>
