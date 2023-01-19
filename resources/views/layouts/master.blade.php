<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Harun Ar - Rasyid Resume</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('layouts.includes.homepage.header')
</head>

<body>
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    @include('layouts.includes.homepage.sidebar')

    @yield('hero-section')

    <main id="main">
        @yield('content')
    </main>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('layouts.includes.homepage.footer')
</body>

</html>
