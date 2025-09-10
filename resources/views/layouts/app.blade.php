<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Auth') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MDBootstrap (Material Design for Bootstrap) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <style>
       

    </style>
</head>
<body>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- MDBootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <script>
    window.addEventListener('scroll', function () {
        const nav = document.querySelector('.main-navigation-container');
        if (window.scrollY > 50) {
            nav.classList.add('sticky-navbar');
        } else {
            nav.classList.remove('sticky-navbar');
        }
    });
</script>

</body>
</html>
