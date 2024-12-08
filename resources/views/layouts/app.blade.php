<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" />



    <script src="{{ asset('assets/js/config.js') }}"></script>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ url('home') }}" style="margin-top:10px" class="app-brand-link">
                        <span class="app-brand-logo demo" style="width:20px height:20px"><i
                                class="ri-book-marked-fill"></i></span>
                        <span class="app-brand-text demo menu-text fw-bold">PDFKnjige</span>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item">
                        <a href="{{ url('home') }}" class="menu-link">
                            <i class="ri-home-2-line" style="margin-right: 10px"></i>
                            <div>Početna</div>
                        </a>
                    </li>


                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="{{ url('user', Auth::user()->id) }}" class="menu-link">
                            <i class="ri-user-line" style="margin-right: 10px"></i>
                            <div>Moj profil</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('notifications') }}" class="menu-link">
                            <i class="ri-notification-3-line" style="margin-right: 10px"></i>
                            <div>Notifikacije</div>
                        </a>
                    </li>
                    <li class="menu-header small">
                        <span class="menu-header-text">Liste</span>
                    </li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="{{ url('popular') }}" class="menu-link">
                            <i class="ri-fire-line" style="margin-right:10px"></i>
                            <div>Najpopularnije</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('new') }}" class="menu-link">
                            <i class="ri-newspaper-line" style="margin-right:10px"></i>
                            <div>Najnovije</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('textbook') }}" class="menu-link">
                            <i class="ri-book-3-fill" style="margin-right:10px"></i>
                            <div>Lektire</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('our') }}" class="menu-link">
                            <i class="ri-contacts-book-2-fill" style="margin-right: 10px"></i>
                            <div>Knjige naših autora</div>
                        </a>
                    </li>

                    <!-- Charts & Maps -->
                    <li class="menu-header small">
                        <span class="menu-header-text">Postani autor</span>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('publish') }}" class="menu-link">
                            <i class="ri-book-fill"></i>
                            <div style="margin-left:10px">Dodaj knjigu</div>
                        </a>
                    </li>

                    <!-- Misc -->
                    <li class="menu-header small">
                        <span class="menu-header-text">Dodatne opcije</span>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('contact') }}"class="menu-link">
                            <i class="ri-mail-send-line"></i>
                            <div style="margin-left:10px">Kontakt</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('cc') }}" class="menu-link">
                            <i class="ri-file-paper-2-line"></i>
                            <div style="margin-left:10px">Autorska prava</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('faq') }}" class="menu-link">
                            <i class="ri-question-mark" style="margin-right:10px"></i>
                            <div style="margin-left:10px">FAQ</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('donate') }}" class="menu-link">
                            <i class="ri-hand-heart-line" style="margin-right:10px"></i>
                            <div style="margin-left:10px">Doniraj</div>
                        </a>
                    </li>
                    @if (Auth::user()->role == 2)
                        <li class="menu-header small">
                            <span class="menu-header-text">Admin opcije</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('status') }}" class="menu-link">
                                <div>Neprovjerene knjige</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('chat') }}" class="menu-link">
                                <div>Poruke</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('/book/create') }}" class="menu-link">
                                <div>Dodaj zvaničnu knjigu</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center" style="margin-top:2px">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <div class="search-bar-wrapper">
                                    <form action="/search">
                                        @csrf
                                        <input type="text" name="querry" id="querry" style="width:1270px"
                                            class="form-control" placeholder="Pronađite Vašu traženu knjigu..." />
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('/profile/' . Auth::user()->image_path) }}" alt
                                            class="rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item mt-0" href="{{ url('user', Auth::user()->id) }}">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('/profile/' . Auth::user()->image_path) }}"
                                                            alt class="rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                                    @if (Auth::user()->role == 2)
                                                        <small class="text-muted">Admin</small>
                                                    @else
                                                        <small class="text-muted">Korisnik</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('user', Auth::user()->id) }}">
                                            <i class="ri-user-line" style="margin-right: 10px"></i>
                                            <span class="align-middle">Moj profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url('user/settings/' . Auth::user()->id) }}">
                                            <i class="ri-settings-line" style="margin-right: 10px"></i>
                                            <span class="align-middle">Postavke</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1 mx-n2"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('publish') }}">
                                            <i class="ri-book-fill" style="margin-right: 10px"></i>
                                            <span class="align-middle">Postani autor</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('faq') }}">
                                            <i class="ri-question-mark" style="margin-right:10px"></i>
                                            <span class="align-middle">FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="d-grid px-2 pt-2 pb-1">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a class="btn btn-sm btn-danger d-flex" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <small class="align-middle">Odjavi se</small>
                                                <i class="ri-logout-box-r-line" style="margin-left: 10px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x search-toggler cursor-pointer"></i>
                    </div>
                </nav>

                <div class="content-wrapper">
                    @yield('content')

                </div>

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                            <div class="text-body">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                PDFKnjiga
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    </div>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

</body>

</html>
