<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>
    <!-- MYDS Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- MYDS: Remove custom style block, handled in app.css -->
</head>
<body class="bg-main" aria-label="Main application body">
    @include('partials.navbar')
    @include('partials.header')
    <main class="container" role="main">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </main>
    @include('partials.footer')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
