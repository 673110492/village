@extends('front.layouts.app')

@section('content')
<!-- Search Bar -->
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

<!-- Breadcrumb Section -->
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
    <div class="border-shape">
        <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $post->title ?? 'Blog Details' }}</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</div>

<!-- Blog Details Section -->
<section class="news-standard fix section-padding">
    <div class="container">
        <div class="news-details-area">
            <div class="row g-5">
                <!-- Main Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details">
                        <div class="single-blog-post">
                            <!-- Post Image -->
                            <div class="post-featured-thumb bg-cover" style="background-image: url('{{ asset('storage/' . $post->cover_image) }}');"></div>

                            <!-- Post Content -->
                            <div class="post-content">
                                <ul class="post-list d-flex align-items-center">
                                    <li><i class="fa-regular fa-user"></i> By {{ $post->author->name ?? 'Admin' }}</li>
                                    <li><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($post->published_at)->format('d M, Y') }}</li>
                                    <li><i class="fa-solid fa-tag"></i> {{ $post->category->name ?? 'IT Services' }}</li>
                                </ul>
                                <h3>{{ $post->slug }}</h3>
                                <p class="mb-3">{{ $post->contenu }}</p>

                            </div>
                        </div>

                        <!-- Tags and Share Section -->
                        <div class="row tag-share-wrap mt-4 mb-5">
                            <div class="col-lg-8 col-12">
                                <div class="tagcloud">
                                    @foreach($post->tags ?? [] as $tag)
                                        <a href="#">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                <div class="social-share">
                                    <span class="me-3">Share:</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-area">
                            <div class="comments-heading">
                                <h3>{{ count($post->comments ?? []) }} Comments</h3>
                            </div>
                            @forelse($post->comments ?? [] as $comment)
                                <div class="blog-single-comment d-flex gap-4 pt-4 pb-5">
                                    <div class="image">
                                        <img src="{{ asset('assets/img/news/comment.png') }}" alt="image">
                                    </div>
                                    <div class="content">
                                        <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                            <div class="con">
                                                <h5>{{ $comment->user->name }}</h5>
                                                <span>{{ $comment->created_at->format('d M, Y \a\t h:i a') }}</span>
                                            </div>
                                            <div class="star">
                                                @for($i = 0; $i < 5; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="mt-30 mb-4">{{ $comment->message }}</p>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            @empty
                                <p>No comments yet.</p>
                            @endforelse
                        </div>

                        <!-- Comment Form Section -->
                        <div class="comment-form-wrap pt-5">
                            <h3>Leave a Comment</h3>
                            <form action="" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="email" name="email" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <textarea name="message" placeholder="Write Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="theme-btn">
                                            Post Comment <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <!-- Search Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Search</h3>
                            </div>
                            <div class="search-widget">
                                <form action="#">
                                    <input type="text" placeholder="Search here">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- End Sidebar -->
                </div>

            </div> <!-- End Row -->
        </div>
    </div>
</section>

@endsection
