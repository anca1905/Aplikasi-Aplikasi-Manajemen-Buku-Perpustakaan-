<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Astro v5.9.2">
    <title>Login | SI Perpustakaan</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <script src="/js/color-modes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link href="/css/sign-in.css" rel="stylesheet">
    <link rel="icon" href="/img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: #0000001a;
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em #0000001a, inset 0 .125em .5em #00000026
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8
        }

        .bd-mode-toggle {
            z-index: 1500
        }

        .bd-mode-toggle .bi {
            width: 1em;
            height: 1em
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important
        }

        input[type="checkbox"]:checked {
            background-color: green;
        }

        .turun {
            padding-bottom: 12px;
        }

        .form-control{
            border-color: gray;
        }

        .form-control:focus {
            border-color: #28a745 !important;
            box-shadow: none !important;
        }

    </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary d-flax justify-content-center">
    <div>
        <div class="text-center">
            <h3>
                <font>
                    <b style="color: green;">Sistem Informasi Perpustakaan</b>
                </font>
            </h3>
            <main class="form-signin w-100 m-auto">
        </div>
        <div class="card">
            <div class="card-body">
                <form>
                    <img class="mb-4 rounded mx-auto d-block" src="/img/logo.png" alt="" width="100"
                        height="auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Login System</h1>
                    <div class="form-floating turun">
                        <div class="position-relative mb-3">
                            <input type="email" class="form-control pr-5" placeholder="Email">
                            <i
                                class="bi bi-person-fill position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                        </div>
                    </div>
                    <div class="form-floating turun">
                        <div class="position-relative mb-3">
                            <input type="password" class="form-control pr-5" placeholder="Password">
                            <i class="bi bi-lock-fill position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                        </div>
                    </div>
                    <div class="form-check text-start my-3">
                        <input class="form-check-input border-success " id="checkDefault" type="checkbox">
                        <label class="fo rm-check-label" for="checkDefault">
                            Remember me
                        </label>
                    </div>
                    <button class="btn btn-success w-100 py-2" type="submit">Masuk</button>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p>
                </form>
            </div>
        </div>

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm">
    </script>
</body>

</html>
