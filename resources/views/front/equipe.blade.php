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
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('assets/img/breadcrumb.jpg');">
    <div class="border-shape">
        <img src="assets/img/element.png" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="assets/img/line-element.png" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Team</h1>
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
                    Our Team
                </li>
            </ul>
        </div>
    </div>
</div>

<!--<< Team Section Start >>-->
<section class="team-section-4 section-padding">
    <div class="container">
        <div class="row g-4">
            @foreach ($equipes as $equipe)
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="team-card-items mt-0">
                        <div class="team-image">
                            <img src="{{ asset('storage/' . $equipe->image) }}" alt="{{ $equipe->name }}">
                            <div class="social-profile">
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>
                                <a href="{{ route('equipe.show', $equipe->id) }}">{{ $equipe->name }}</a>
                            </h3>
                            <p>{{ $equipe->fonction }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
