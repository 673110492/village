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
            <h1 class="wow fadeInUp" data-wow-delay=".3s">NOS ACTUALITES</h1>
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
                    Blog Grid
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- News Section Start -->
@foreach ($post as $poster)
<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
    <div class="news-card-items style-2 mt-0 pb-0">
        <div class="news-image">
            <img src="{{ asset('storage/' . $poster->cover_image) }}" alt="news-img">
            <div class="post-date">
                <h3>
                    {{ $poster->published_at ? $poster->published_at->format('d') : '' }} <br>
                    <span>{{ $poster->published_at ? $poster->published_at->format('M') : '' }}</span>
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
                <a href="{{ route('blog.show', $poster->slug) }}">{{ \Illuminate\Support\Str::limit($poster->contenu, 50) }}</a>
            </h3>
            <a href="{{ route('blog.show', $poster->slug) }}" class="theme-btn-2 mt-3">
                Read More
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</div>
@endforeach

@endsection
