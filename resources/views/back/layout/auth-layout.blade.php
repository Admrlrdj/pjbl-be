<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Danggedang - @yield('pageTitle')</title>
    <link rel="icon" type="image/png" sizes="16x16"
        href="/images/site/{{ isset(settings()->site_favicon) ? settings()->site_favicon : '' }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('stylesheets')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #fff;
        }

        .page-flex {
            display: flex;
            min-height: 100vh;
        }

        .page-left {
            flex: 1;
            background: #FFD700;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }

        .page-left img {
            max-width: 400px;
            width: 100%;
        }

        .page-left h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-top: 32px;
            color: #2B2B2B;
        }

        .page-right {
            flex: 1;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 10px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .page-flex {
                flex-direction: column;
            }

            .page-left,
            .page-right {
                width: 100%;
                min-height: 220px;
                padding: 28px 8px;
            }
        }
    </style>
</head>

<body class="login-page">
    <div class="page-flex">
        <div class="page-left">
            <img src="/images/login.png" class=alt="Logo Danggedang" />
            <h2>Selamat Datang, Admin</h2>
        </div>
        <div class="page-right">
            @yield('content')
        </div>
    </div>
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>
    @stack('scripts')
</body>

</html>
