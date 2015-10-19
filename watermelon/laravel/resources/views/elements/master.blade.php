<!doctype html>
<html>
<head>
    @include('elements.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('elements.header')
    </header>

    <div id="main" class="row" style="align:center">

            @yield('content')

    </div>

    <footer class="row">
        @include('elements.footer')
    </footer>
</div>
</body>
</html>