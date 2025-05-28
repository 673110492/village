@extends('front.layouts.app')
@section('content')


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

<!-- Hero Section Start -->
<section class="hero-section fix hero-3">
    <div class="bottom-shape">
        <img src="assets/img/hero/bottom-shape.png" alt="shape-img">
    </div>
    <div class="array-button">
        <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
        <button class="array-next"><i class="fal fa-arrow-left"></i></button>
    </div>
   <div class="swiper hero-slider">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-2.jpg');">
                <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                    <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                </div>
                <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/hero/border-shape.png" alt="shape-img">
                </div>
                <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                    <img src="assets/img/choose/circle.png" alt="shape-img">
                </div>
                <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/frame.png" alt="shape-img">
                </div>
            </div>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-content">
                            <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Centre communautaire</h5>
                            <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                Bienvenue à <br> La Maison du Village
                            </h1>
                            <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                Un espace de partage, de formation et d’innovation <br> pour toute la communauté.
                            </p>
                            <div class="hero-button">
                                <a href="about.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn hover-white">
                                    En savoir plus
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <a href="contact.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn border-white">
                                    Nous contacter
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
            <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-1.jpg');">
                <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                    <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                </div>
                <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/hero/border-shape.png" alt="shape-img">
                </div>
                <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                    <img src="assets/img/choose/circle.png" alt="shape-img">
                </div>
                <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/frame.png" alt="shape-img">
                </div>
            </div>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-content">
                            <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Formations & Ateliers</h5>
                            <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                Développez vos compétences <br> avec nos programmes
                            </h1>
                            <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                Informatique, agriculture, artisanat, entrepreneuriat : <br> des modules adaptés à tous les âges.
                            </p>
                            <div class="hero-button">
                                <a href="about.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn hover-white">
                                    Découvrir
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <a href="contact.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn border-white">
                                    Prendre rendez-vous
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
            <div class="slider-image bg-cover" style="background-image: url('assets/img/hero/hero-3.jpg');">
                <div class="mask-shape" data-animation="slideInDown" data-duration="3s" data-delay="2s">
                    <img src="assets/img/hero/mask-shape-2.png" alt="shape-img">
                </div>
                <div class="border-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/hero/border-shape.png" alt="shape-img">
                </div>
                <div class="circle-shape" data-animation="slideInRight" data-duration="3s" data-delay="2.1s">
                    <img src="assets/img/choose/circle.png" alt="shape-img">
                </div>
                <div class="frame" data-animation="slideInLeft" data-duration="3s" data-delay="2.2s">
                    <img src="assets/img/frame.png" alt="shape-img">
                </div>
            </div>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <div class="hero-content">
                            <h5 data-animation="slideInRight" data-duration="2s" data-delay=".3s">Engagement social</h5>
                            <h1 data-animation="slideInRight" data-duration="2s" data-delay=".5s">
                                Construisons ensemble <br> un avenir meilleur
                            </h1>
                            <p data-animation="slideInRight" data-duration="2s" data-delay=".9s">
                                Participez à nos actions solidaires : soutien scolaire, éducation numérique, <br> agriculture durable et bien plus.
                            </p>
                            <div class="hero-button">
                                <a href="about.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn hover-white">
                                    Rejoignez-nous
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <a href="contact.html" data-animation="slideInRight" data-duration="2s" data-delay=".9s" class="theme-btn border-white">
                                    Faire un don
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@php
function getYoutubeId($url) {
    if (!$url) return null;

    // Cas URL courte https://youtu.be/ID
    if (preg_match('/youtu\.be\/([^\?\/]+)/', $url, $matches)) {
        return $matches[1];
    }

    // Cas URL classique https://www.youtube.com/watch?v=ID ou autres params
    if (preg_match('/v=([^&]+)/', $url, $matches)) {
        return $matches[1];
    }

    // Cas URL embed https://www.youtube.com/embed/ID
    if (preg_match('/embed\/([^\?\/]+)/', $url, $matches)) {
        return $matches[1];
    }

    return null; // Pas trouvé
}
@endphp


@foreach($abouts as $about)
<section class="about-section section-padding fix bg-cover" style="background-image: url('{{ asset('storage/' . ($about->background_image ?? 'assets/img/service/service-bg-2.jpg')) }}');">
    <div class="container">
        <div class="about-wrapper style-2">
            <div class="row">
                <!-- Image Section -->
                <div class="col-lg-6">
                    <div class="card shadow rounded-4 overflow-hidden">
                        <div class="card-body p-3">
                            <!-- Cercle décoratif (optionnel) -->
                            <div class="text-center mb-3">
                                <img src="{{ asset('assets/img/about/circle.png') }}" alt="shape-img" class="img-fluid" style="max-width: 80px;">
                            </div>

                            <!-- Première image -->
                            <div class="mb-3 wow fadeInLeft" data-wow-delay=".3s">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="about-img-1" class="img-fluid rounded w-100">
                            </div>

                            <!-- Intégration lien YouTube -->
                            @php
                                $youtubeId = getYoutubeId($about->lient_youtube);
                            @endphp

                            @if($youtubeId)
                            <div class="video-section wow fadeInUp" data-wow-delay=".5s" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                <iframe 
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius: .5rem;"
                                ></iframe>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="about-content">
                        <div class="section-title">
                            <span class="wow fadeInUp">{{ $about->slug }}</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                {{ $about->slug }}
                            </h2>
                        </div>
                        <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                            {!! $about->contenu !!}
                        </p>

                        <div class="about-author">
                            <div class="about-button wow fadeInUp" data-wow-delay=".5s">
                                <a href="about.html" class="theme-btn">
                                    Explore More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endforeach



<!-- Brand Section Start -->
<div class="brand-section fix section-padding pt-0">
    <div class="container">
        <div class="brand-wrapper">
            <h6 class="text-center wow fadeInUp" data-wow-delay=".3s">1k + Brands Trust Us</h6>
            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="assets/img/brand.png" alt="brand-img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="assets/img/brand.png" alt="brand-img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="assets/img/brand.png" alt="brand-img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="assets/img/brand.png" alt="brand-img">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-image">
                            <img src="assets/img/brand.png" alt="brand-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Section Start -->
<section class="service-section-3 pb-0 fix section-padding bg-cover" style="background-image: url('assets/img/service/service-bg-3.jpg');">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span>What We Do</span>
                <h2>
                    We Solve IT Problems <br> With Technology
                </h2>
            </div>
            <a href="service.html" class="theme-btn">
                See all Services
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="service-card-items">
                    <div class="service-image">
                        <img src="assets/img/service/02.jpg" alt="service-img">
                    </div>
                    <div class="icon-2">
                        <img src="assets/img/service/icon/s-icon-1.svg" alt="img">
                    </div>
                    <div class="service-content">
                        <div class="icon">
                            <img src="assets/img/service/icon/s-icon-1.svg" alt="img">
                        </div>
                        <h4>
                            <a href="service-details.html">Database Security</a>
                        </h4>
                        <p>
                            accumsan. Pellentesque in magna tincidunt, this is.
                        </p>
                        <a href="service-details.html" class="theme-btn-2 mt-3">
                            read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="service-card-items">
                    <div class="service-image">
                        <img src="assets/img/service/03.jpg" alt="service-img">
                    </div>
                    <div class="icon-2">
                        <img src="assets/img/service/icon/s-icon-2.svg" alt="img">
                    </div>
                    <div class="service-content">
                        <div class="icon">
                            <img src="assets/img/service/icon/s-icon-2.svg" alt="img">
                        </div>
                        <h4>
                            <a href="service-details.html">IT Consultancy</a>
                        </h4>
                        <p>
                            accumsan. Pellentesque in magna tincidunt, this is.
                        </p>
                        <a href="service-details.html" class="theme-btn-2 mt-3">
                            read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="service-card-items">
                    <div class="service-image">
                        <img src="assets/img/service/04.jpg" alt="service-img">
                    </div>
                    <div class="icon-2">
                        <img src="assets/img/service/icon/s-icon-4.svg" alt="img">
                    </div>
                    <div class="service-content">
                        <div class="icon">
                            <img src="assets/img/service/icon/s-icon-5.svg" alt="img">
                        </div>
                        <h4>
                            <a href="service-details.html">App Development</a>
                        </h4>
                        <p>
                            accumsan. Pellentesque in magna tincidunt, this is.
                        </p>
                        <a href="service-details.html" class="theme-btn-2 mt-3">
                            read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="service-card-items">
                    <div class="service-image">
                        <img src="assets/img/service/05.jpg" alt="service-img">
                    </div>
                    <div class="icon-2">
                        <img src="assets/img/service/icon/s-icon-3.svg" alt="img">
                    </div>
                    <div class="service-content">
                        <div class="icon">
                            <img src="assets/img/service/icon/s-icon-3.svg" alt="img">
                        </div>
                        <h4>
                            <a href="service-details.html">Database Security</a>
                        </h4>
                        <p>
                            accumsan. Pellentesque in magna tincidunt, this is.
                        </p>
                        <a href="service-details.html" class="theme-btn-2 mt-3">
                            read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-banner-2 section-padding">
        <div class="container">
            <div class="cta-wrapper-2">
                <div class="author-icon">
                    <div class="icon">
                         <i class="fa-solid fa-phone"></i>
                    </div>
                     <div class="content">
                         <span>Call Us Now</span>
                         <h4>
                             <a href="tel:+2085550112">+208-555-0112</a>
                         </h4>
                     </div>
                </div>
                <h3>
                    Stay Connected With <br> Cutting Edge IT
                </h3>
                <a href="contact.html" class="theme-btn bg-white">
                    get A Quote
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Work Process Section Start -->
<section class="work-process-section fix section-padding pt-0">
    <div class="container">
        <div class="section-title text-center">
            <span>How IT work</span>
            <h2>Standard Work Process</h2>
        </div>
        <div class="process-work-wrapper">
            <div class="line-shape">
                <img src="assets/img/process/linepng.png" alt="">
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="work-process-items text-center">
                        <div class="icon">
                            <img src="assets/img/process/01.svg" alt="img">
                            <h6 class="number">
                                1
                            </h6>
                        </div>
                        <div class="content">
                            <h4>Choose A Service</h4>
                            <p>
                                In a free hour, when our power of choice is untrammeled and
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="work-process-items text-center">
                        <div class="content style-2">
                            <h4>Define Requirements</h4>
                            <p>
                                In a free hour, when our power of choice is untrammeled and
                            </p>
                        </div>
                        <div class="icon">
                            <img src="assets/img/process/02.svg" alt="img">
                            <h6 class="number">
                                2
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="work-process-items text-center">
                        <div class="icon">
                            <img src="assets/img/process/03.svg" alt="img">
                            <h6 class="number">
                                3
                            </h6>
                        </div>
                        <div class="content">
                            <h4>Request A Meeting</h4>
                            <p>
                                In a free hour, when our power of choice is untrammeled and
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="work-process-items text-center">
                        <div class="content style-2">
                            <h4>Finial Solutio3</h4>
                            <p>
                                In a free hour, when our power of choice is untrammeled and
                            </p>
                        </div>
                        <div class="icon">
                            <img src="assets/img/process/04.svg" alt="img">
                            <h6 class="number">
                                4
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievement Section Start -->
<section class="achievement-section-3 fix section-bg-2">
    <div class="shape-image">
        <img src="assets/img/achiv-shape.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="achievement-wrapper style-2">
            <div class="section-title mb-0">
                <span class="text-white wow fadeInUp">achievement</span>
                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                    We Are Increasing <br> Business Success
                </h2>
            </div>
            <div class="counter-area">
                <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                    <div class="icon">
                        <img src="assets/img/achievement-icon/01.svg" alt="icon-img">
                    </div>
                    <div class="content">
                        <h2><span class="count">6,561</span>+</h2>
                        <p>Satisfied Clients</p>
                    </div>
                </div>
                <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                    <div class="icon">
                        <img src="assets/img/achievement-icon/02.svg" alt="icon-img">
                    </div>
                    <div class="content">
                        <h2><span class="count">600</span>+</h2>
                        <p>Finished Projects</p>
                    </div>
                </div>
                <div class="counter-items wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon">
                        <img src="assets/img/achievement-icon/03.svg" alt="icon-img">
                    </div>
                    <div class="content">
                        <h2><span class="count">250</span>+</h2>
                        <p>Skilled Experts</p>
                    </div>
                </div>
                <div class="counter-items wow fadeInUp" data-wow-delay=".9s">
                    <div class="icon">
                        <img src="assets/img/achievement-icon/04.svg" alt="icon-img">
                    </div>
                    <div class="content">
                        <h2><span class="count">5,90</span>+</h2>
                        <p>Media Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-section-3 section-padding pb-0 fix bg-cover" style="background-image: url('assets/img/testimonial/bg.jpg');">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="text-white">PROJECTS</span>
                <h2 class="text-white">
                    Nos Derniers Projets Incroyables
                </h2>
            </div>
            <div class="video-box">
                <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn ripple video-popup">
                    <i class="fa-solid fa-play"></i>
                </a>
            </div>
        </div>
        <div class="project-wrapper style-2">
            <div class="swiper project-slider-3">
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <div class="project-items style-2">
                                <div class="project-image">
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="project-img">
                                    <div class="project-content">
                                        <p>{{ $project->slug }}</p>

                                        <a href="" class="arrow-icon-2">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="swiper-dot-2 mr-left">
            <div class="dot-2"></div>
        </div>
    </div>
</section>


<!--<< Marque Section Start >>-->
<div class="marque-section section-padding">
    <div class="container-fluid">
        <div class="marquee-wrapper style-2 text-slider">
            <div class="marquee-inner to-left">
                <ul class="marqee-list d-flex">
                    <li class="marquee-item style-2">
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Cyber Security</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">IT Solution</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Technology</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Data Security</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Cyber Security</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">IT Solution</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Technology</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Data Security</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Cyber Security</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">IT Solution</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Technology</span>
                        <span class="text-slider"><img src="assets/img/asterisk.svg" alt="img"></span><span class="text-slider text-style">Data Security</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--<< Team Section Start >>-->
<section class="team-section-3 fix section-padding section-bg">
    <div class="line-shape">
        <img src="assets/img/team/line-shape.png" alt="shape-img">
    </div>
    <div class="mask-shape">
        <img src="assets/img/team/mask-shape-2.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="wow fadeInUp">Team Members</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Our Dedicated Team <br> Members
                </h2>
            </div>
            <a href="team.html" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                All Member
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="single-team-items">
                    <div class="team-image">
                        <img src="assets/img/team/04.jpg" alt="team-img">
                        <div class="social-profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                            </ul>
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="team-details.html">Marvin McKinney</a>
                        </h3>
                        <p>Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="single-team-items">
                    <div class="team-image">
                        <img src="assets/img/team/05.jpg" alt="team-img">
                        <div class="social-profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                            </ul>
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="team-details.html">Marvin McKinney</a>
                        </h3>
                        <p>Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="single-team-items">
                    <div class="team-image">
                        <img src="assets/img/team/06.jpg" alt="team-img">
                        <div class="social-profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                            </ul>
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="team-details.html">Marvin McKinney</a>
                        </h3>
                        <p>Web Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                <div class="single-team-items">
                    <div class="team-image">
                        <img src="assets/img/team/07.jpg" alt="team-img">
                        <div class="social-profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                            </ul>
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="team-details.html">Marvin McKinney</a>
                        </h3>
                        <p>Web Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<< Testimonial Section Start >>-->
<section class="tesimonial-section-3 section-padding section-bg-2 bg-cover">
    <div class="line-shape">
        <img src="assets/img/team/line-shape.png" alt="shape-img">
    </div>
    <div class="mask-shape">
        <img src="assets/img/team/mask-shape.png" alt="shape-img">
    </div>
    <div class="array-button">
        <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
        <button class="array-next"><i class="fal fa-arrow-right"></i></button>
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="text-white">Testimonials</span>
            <h2 class="text-white">
                People Who Already Love Us
            </h2>
        </div>
        <div class="swiper testimonial-slider-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-box-items">
                        <div class="icon">
                            <img src="assets/img/testimonial/icon.png" alt="icon-img">
                        </div>
                        <div class="client-items">
                            <div class="client-image style-2 bg-cover" style="background-image: url('assets/img/testimonial/02.jpg');"></div>
                            <div class="client-content">
                                <h4>Kathryn Murphy</h4>
                                <p>Web Designer</p>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-box-items">
                        <div class="icon">
                            <img src="assets/img/testimonial/icon.png" alt="icon-img">
                        </div>
                        <div class="client-items">
                            <div class="client-image style-2 bg-cover" style="background-image: url('assets/img/testimonial/03.jpg');"></div>
                            <div class="client-content">
                                <h4>Albert Flores</h4>
                                <p>Medical Assistant</p>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star color-text"></i>
                                </div>
                            </div>
                        </div>
                        <p>
                            Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section Start -->
<section class="news-section-3 fix section-padding">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="wow fadeInUp">Latest Blog</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Checkout Our Latest <br> News & Articles
                </h2>
            </div>
            <div class="array-button">
                <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
                <button class="array-next"><i class="fal fa-arrow-left"></i></button>
            </div>
        </div>
        <div class="swiper news-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="news-card-items style-2">
                        <div class="news-image">
                            <img src="assets/img/news/04.jpg" alt="news-img">
                            <div class="post-date">
                                <h3>
                                    17 <br>
                                    <span>Feb</span>
                                </h3>
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                                <li>
                                    <i class="fa-solid fa-tag"></i>
                                    IT Services
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Simplify Streamline Succeed  IT Solutions</a>
                            </h3>
                            <a href="news-details.html" class="theme-btn-2 mt-3">
                                read More
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="news-card-items style-2">
                        <div class="news-image">
                            <img src="assets/img/news/07.jpg" alt="news-img">
                            <div class="post-date">
                                <h3>
                                    20 <br>
                                    <span>May</span>
                                </h3>
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                                <li>
                                    <i class="fa-solid fa-tag"></i>
                                    UI/UX Design
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Unlocking Potential Through Technology</a>
                            </h3>
                            <a href="news-details.html" class="theme-btn-2 mt-3">
                                read More
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="news-card-items style-2">
                        <div class="news-image">
                            <img src="assets/img/news/08.jpg" alt="news-img">
                            <div class="post-date">
                                <h3>
                                    10 <br>
                                    <span>Feb</span>
                                </h3>
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By Admin
                                </li>
                                <li>
                                    <i class="fa-solid fa-tag"></i>
                                    Cyber Security
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Supervisor Disapproved of Latest Work.</a>
                            </h3>
                            <a href="news-details.html" class="theme-btn-2 mt-3">
                                read More
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
