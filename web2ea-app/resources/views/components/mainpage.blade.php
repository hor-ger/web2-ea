<!DOCTYPE HTML>
<html lang="hu">
<head>
    <title>{{ $title ?? 'Cukrászda' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
</head>
<body class="is-preload">
    <div id="page-wrapper">

        @include('header')

        <section class="wrapper style1">
            <div class="container">
                <div id="content">
                    {{ $slot }}
                </div>
            </div>
        </section>

        <div id="footer">
            <div class="copyright">
                <ul class="menu">
                    <li>&copy; Cukrászda Web-programozás II.</li>
                </ul>
            </div>
        </div>

    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.dropotron.min.js"></script>
    <script src="/assets/js/browser.min.js"></script>
    <script src="/assets/js/breakpoints.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>