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
            <h1 class="wow fadeInUp" data-wow-delay=".3s">Project</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">

                <li><i class="fas fa-chevron-right"></i></li>
                <li>Project</li>
            </ul>
        </div>
    </div>
</div>

<!-- Project Section Start -->
<section class="project-section section-padding fix">
    <div class="container">
        <div class="row g-4">
            @foreach ($projects as $project)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="project-items">
                        <div class="project-image">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="project-img">
                            <div class="project-content">
                                <p>Projet</p>
                                <h4>
                                    {{ strlen(html_entity_decode(strip_tags($project->description))) > 40
                                        ? substr(html_entity_decode(strip_tags($project->description)), 0, 40) . '...'
                                        : html_entity_decode(strip_tags($project->description)) }}
                                </h4>

                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-primary mt-2">Voir le projet</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
