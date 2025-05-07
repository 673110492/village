@extends('front.layouts.app')
@section('content')
    <!-- Search Area Start -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fas fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--<< Breadcrumb Section Start >>-->
    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
        <div class="border-shape">
            <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
        </div>
        <div class="line-shape">
            <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Team Details</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-chevron-right"></i>
                    </li>
                    <li>
                        Team Details
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Team Section Start -->
    <section class="team-details-section fix section-padding">
        <div class="container">
            <div class="team-details-wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <div class="team-details-image">
                            <img src="{{ asset('storage/' . $membre->image) }}" alt="team-img">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="team-details-content">
                            <div class="details-info">
                                <h3>{{ $membre->name }}</h3>
                                <span>{{ $membre->fonction }}</span>
                            </div>
                            <p class="mt-3">
                                {{ $membre->presentation }}
                            </p>
                           
                            <div class="social-icon mt-3">
                                <span>Contact:</span>
                                <p>{{ $membre->tel }}</p>
                                <!-- Ajoute les liens sociaux si tu as les champs -->
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    /* Style des icônes sociales */
                    .social-icon__link {
                        font-size: 40px;
                        /* Augmente la taille des icônes */
                        margin-right: 15px;
                        transition: transform 0.3s ease;
                        /* Animation lors du survol */
                    }

                    /* Effet de survol pour les icônes */
                    .social-icon__link:hover {
                        transform: scale(1.1);
                        /* Agrandir l'icône au survol */
                    }

                    /* Couleurs spécifiques pour chaque réseau social */
                    .social-icon__link.facebook {
                        color: #1877f2;
                        /* Bleu Facebook */
                    }

                    .social-icon__link.twitter {
                        color: #1da1f2;
                        /* Bleu Twitter */
                    }

                    .social-icon__link.linkedin {
                        color: #0077b5;
                        /* Bleu LinkedIn */
                    }

                    .social-icon__link.youtube {
                        color: #ff0000;
                        /* Rouge YouTube */
                    }

                    .social-icon__link.whatsapp {
                        color: #25d366;
                        /* Vert WhatsApp */
                    }

                    .social-icon__link.tiktok {
                        color: #000000;
                        /* Noir TikTok */
                    }

                    /* Change la couleur de l'icône au survol */
                    .social-icon__link:hover.facebook {
                        color: #1558b0;
                    }

                    .social-icon__link:hover.twitter {
                        color: #1b91d6;
                    }

                    .social-icon__link:hover.linkedin {
                        color: #00659c;
                    }

                    .social-icon__link:hover.youtube {
                        color: #cc0000;
                    }

                    .social-icon__link:hover.whatsapp {
                        color: #128c7e;
                    }

                    .social-icon__link:hover.tiktok {
                        color: #333333;
                    }
                </style>
                <div class="team-single-history pt-5">
                    <div class="title">
                        <h3>Contactez-nous</h3>
                    </div>
                    <div class="social-icon">
                        <span>Suivez-nous sur :</span>
                        <a href="#" target="_blank" class="social-icon__link facebook"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" target="_blank" class="social-icon__link twitter"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a href="#" target="_blank" class="social-icon__link linkedin"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" target="_blank" class="social-icon__link youtube"><i
                                class="fa-brands fa-youtube"></i></a>
                        <a href="#" target="_blank" class="social-icon__link whatsapp"><i
                                class="fa-brands fa-whatsapp"></i></a>
                        <a href="#" target="_blank" class="social-icon__link tiktok"><i
                                class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
