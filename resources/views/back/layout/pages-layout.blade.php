<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Danggedang - @yield('pageTitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site favicon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="/images/site/{{ isset(settings()->site_favicon) ? settings()->site_favicon : '' }}" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" href="/extra-assets/ijabo/css/ijabo.min.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.theme.min.css" />

    <style>
        .left-side-bar .menu-block .sidebar-menu ul li a:hover,
        .left-side-bar .menu-block .sidebar-menu ul li a.active {
            background-color: #ffc107 !important;
            color: #ffffff !important;
        }

        .left-side-bar .menu-block .sidebar-menu ul li a:hover .micon,
        .left-side-bar .menu-block .sidebar-menu ul li a.active .micon {
            color: #ffffff !important;
        }

        .swal2-confirm {
            background-color: #FFD700 !important;
            color: #ffffff !important;
        }
    </style>
    @kropifyStyles
    @stack('stylesheets')
</head>

<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here" />
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            @livewire('admin.top-user-info')
        </div>
    </div>

    <div class="right-sidebar">
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i
                                class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i
                                class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="/">
                <img src="/images/site/{{ isset(settings()->site_logo) ? settings()->site_logo : '' }}" alt=""
                    class="dark-logo site_logo" style="margin-left: 20px; width: auto;" />
                <img src="/images/site/{{ isset(settings()->site_logo) ? settings()->site_logo : '' }}" alt=""
                    class="light-logo site_logo" style="margin-left: 20px; width: auto;" />
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                            {{-- <i class="icon-copy bi bi-house"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.products') ? 'active' : '' }}">
                            <span class="micon bi bi-box-seam"></span>
                            <span class="mtext">Produk</span>
                            {{-- <i class="icon-copy bi bi-box-seam"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                            <span class="micon bi bi-grid"></span>
                            <span class="mtext">Kategori</span>
                            {{-- <i class="icon-copy bi bi-grid"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.testimonials') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.testimonials') ? 'active' : '' }}">
                            <span class="micon bi bi-person"></span>
                            <span class="mtext">Testimoni</span>
                            {{-- <i class="icon-copy bi bi-person"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contact_us') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.contact_us') ? 'active' : '' }}">
                            <span class="micon bi bi-chat-right-dots">
                            </span><span class="mtext">Kontak</span>
                            {{-- <i class="icon-copy bi bi-chat-right-dots"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.locations') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.locations') ? 'active' : '' }}">
                            <span class="micon bi bi-map"></span>
                            <span class="mtext">Lokasi</span>
                            {{-- <i class="icon-copy bi bi-map"></i> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faqs') }}"
                            class="dropdown-toggle no-arrow {{ request()->routeIs('admin.faqs') ? 'active' : '' }}">
                            <span class="micon bi bi-question-circle"></span>
                            <span class="mtext">FAQ</span>
                            {{-- <i class="icon-copy bi bi-question-circle"></i> --}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="">

                    @yield('content')

                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                © 2025 Nounoufood. All rights reserved.
                {{-- <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a> --}}
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>
    <script src="/extra-assets/ijabo/js/ijabo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.js"></script>
    @kropifyScripts
    <script>
        window.addEventListener('showToastr', function(event) {
            toastr.options = {
                "closeButton": true,
                "preventDuplicates": true,
                "positionClass": "toast-top-full-width",
                "timeOut": "3000"
            };

            if (event.detail[0].type === 'success') {
                toastr.success(event.detail[0].message);
            } else if (event.detail[0].type === 'error') {
                toastr.error(event.detail[0].message);
            } else if (event.detail[0].type === 'info') {
                toastr.info(event.detail[0].message);
            } else if (event.detail[0].type === 'warning') {
                toastr.warning(event.detail[0].message);
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
