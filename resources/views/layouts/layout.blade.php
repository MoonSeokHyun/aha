<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Childcare Centers</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="bg-light py-3">
        <div class="container">
            <h1>Welcome to Childcare Centers</h1>
        </div>
    </header>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="bg-light py-3">
        <div class="container">
            <p>Copyright 2023, Childcare Centers</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
