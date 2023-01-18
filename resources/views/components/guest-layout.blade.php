<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sora:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Starbucks</title>
</head>

<body>
    <nav
        class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img
                    src="/img/starbucks.svg"
                    alt="Starbucks"
                    height="50" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="/"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/menu?type=STARBUCKS BEVERAGES">Starbucks Beverages</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/menu?type=FRESH FOOD">Fresh Food</a>
                            </li>
                        </ul>
                    </li>
                    <a class="nav-link" href="/about">About</a>
                    @if (count($promos) > 0)
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="/"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Promo
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($promos as $row)
                                    <li>
                                        <a class="dropdown-item"
                                            href="/promo/{{ $row->id }}">{{ $row->event }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    {{ $slot }}
    <footer class="border-top mt-5">
        <div
            class="container d-flex flex-wrap justify-content-between align-items-center py-4 gap-4">
            <div class="d-flex flex-wrap gap-3">
                <a class="text-decoration-none" href="#">Privacy Statement</a>
                <div class="vr"></div>
                <a class="text-decoration-none" href="#">Terms of use</a>
                <div class="vr"></div>
                <a class="text-decoration-none" href="#">Site Map</a>
                <div class="vr"></div>
                <a class="text-decoration-none" href="#">Cookie Preferences</a>
            </div>
            <div class="d-flex gap-3">
                <a href="https://instagram.com/starbucks?igshid=YmMyMTA2M2Y="><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/SbuxIndonesia?t=nID9DJ77utvjKTgChx0IBA&s=08"><i class="bi bi-twitter"></i></a>
                <a href="https://m.facebook.com/pg/StarbucksIndonesia/community/"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
        <small class="pb-2 text-center d-block">
            © 2023 Starbucks Coffee Company, All Rights Reserved.
        </small>
    </footer>
</body>

</html>
