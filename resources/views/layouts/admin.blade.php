<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harun Ar - Rasyid - Resume</title>
    @include('layouts.includes.admin.header')
</head>

<body>
    <div id="app">
        @include('layouts.includes.admin.sidebar')
        <div id="main" class="layout-navbar navbar-fixed">
            @include('layouts.includes.admin.navbar')
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>@yield('title')</h3>
                                <p class="text-subtitle text-muted">@yield('subtitle','')</p>
                            </div>
                            @include('layouts.includes.admin.breadcrumb')
                        </div>
                    </div>

                    @yield('content')
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>
                                Crafted with
                                <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Saugi</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    @include('layouts.includes.admin.footer')
</body>

</html>
