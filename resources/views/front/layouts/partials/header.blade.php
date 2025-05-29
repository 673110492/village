<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="gramentheme">
    <meta name="description" content="Infotek - IT Solution & Technology HTML Template">
    <!-- ======== Page title ============ -->
    <title>La maison du village</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.jpg') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">


    <style>
        .header-left {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            /* Couleur de fond si nécessaire */
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .header-logo img {
            height: 60px;
            /* Ajuste la hauteur selon tes besoins */
            width: auto;
            border-radius: 8px;
            /* Coins arrondis pour un look plus doux */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Légère ombre pour la profondeur */
            transition: transform 0.3s ease;
        }

        .header-logo img:hover {
            transform: scale(1.05);
            /* Zoom léger au survol */
        }
    </style>
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="LA" class="letters-loading">
                    LA
                </span>
                <span data-text-preloader="MAI" class="letters-loading">
                    MAI
                </span>
                <span data-text-preloader="SON" class="letters-loading">
                    SON
                </span>
                <span data-text-preloader="DU" class="letters-loading">
                    DU
                </span>
                <span data-text-preloader="VI" class="letters-loading">
                    VI
                </span>
                <span data-text-preloader="LLA" class="letters-loading">
                    LLA
                </span>
                <span data-text-preloader="GE" class="letters-loading">
                    GE
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!--<< Mouse Cursor Start >>-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">
                                        {{ site_setting('address', 'Adresse non spécifiée') }}
                                    </a>
                                </div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="mailto:{{ site_setting('email', 'info@example.com') }}">
                                        {{ site_setting('email', 'info@example.com') }}
                                    </a>
                                </div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-clock"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank" href="#">
                                        {{ site_setting('working_hours', 'Lun-Ven, 09h-17h') }}
                                    </a>
                                </div>
                            </li>

                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:{{ site_setting('tel1', '+11002345909') }}">
                                        {{ site_setting('tel1', '+11002345909') }}
                                    </a>
                                </div>
                            </li>

                            @if (site_setting('tel2'))
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:{{ site_setting('tel2') }}">
                                            {{ site_setting('tel2') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>

                        <div class="header-button mt-4">
                            <a href="contact.html" class="theme-btn text-center">
                                <span>get A Quote<i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Section Start -->
    <header>
        <div class="header-top-section top-style-3">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="contact-list">
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:info@example.com" class="link">info@example.com</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone-volume"></i>
                            <a href="tel:2086660112">+208-666-0112</a>
                        </li>
                    </ul>
                    <div class="top-right">
                        <div class="flag-wrap">
                            <div class="flag">
                                <img src="{{ asset('assets/img/flag.png') }}" alt="flag">
                            </div>
                            <div class="nice-select" tabindex="0">
                                <span class="current">

                                </span>
                                <ul class="list">
                                    <li data-value="1" class="option selected focus">
                                        English
                                    </li>
                                    <li data-value="1" class="option">
                                        Bangla
                                    </li>
                                    <li data-value="1" class="option">
                                        Hindi
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="social-icon d-flex align-items-center">
                            <span>Follow Us:</span>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-sticky" class="header-3">
            <div class="plane-shape">
                <img src="assets/img/plane.png" alt="shape-img">
            </div>
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="header-left">
                            <div class="logo">
                                <a href="index.html" class="header-logo">
                                    <img src="{{ asset('assets/img/logo/logo.jpg') }}" alt="Logo du site">
                                </a>
                            </div>
                        </div>

                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="has-dropdown active menu-thumb">
                                                <a href="{{ route('accueil.index') }}">
                                                    Home
                                                </a>

                                            </li>


                                            <li>
                                                <a href="{{ route('propos.index') }}">About</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cultures.index') }}">Culture</a>
                                            </li>

                                            <li>
                                                <a href="">Women Empowerment</a>
                                            </li>

                                            <li>
                                                <a href="">Holiday camp</a>
                                            </li>
                                           

                                            <li>
                                                <a href="">Youth Day</a>
                                            </li>

                                            <li><a href="{{ route('blog.index') }}">Actulites</a></li>

                                            <li>
                                                <a href="news.html">
                                                    Services
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="service.html">Services</a></li>
                                                    <li><a href="service-carousel.html">Service Carousel</a></li>
                                                    <li><a href="service-details.html">Service Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="news.html">
                                                    Pages
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li class="has-dropdown">
                                                        <a href="project.html">
                                                            Projects
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{ route('projects.index') }}">Projet</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-dropdown">
                                                        <a href="team.html">
                                                            Equipe
                                                            <i class="fas fa-angle-down"></i>
                                                        </a>
                                                        <ul class="submenu">
                                                            <li><a href="{{ route('equipe.index') }}">Notre Equipe</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="pricing.html">Pricing</a></li>
                                                    <li><a href="faq.html">Faq's</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="news.html">
                                                    Blog
                                                    <i class="fas fa-angle-down"></i>
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="{{ route('blog.index') }}">Actulites</a></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('contacter.index') }}">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                            <div class="header-button">
                                <a href="{{ route('contacter.index') }}" class="theme-btn bg-white">
                                    <span>
                                        get A Quote
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="header__hamburger d-lg-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
