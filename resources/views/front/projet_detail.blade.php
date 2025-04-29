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
        <img src="{{asset('assets/img/element.png')}}" alt="shape-img">
    </div>
    <div class="line-shape">
        <img src="{{asset('assets/img/line-element.png')}}" alt="shape-img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">Project Details</h1>
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
                    Project Details
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Project Section Start -->
<section class="Project-details-section fix section-padding">
    <div class="container">
        <div class="project-details-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-items">
                        <div class="details-image">
                            <!-- Utilisation de l'image dynamique -->
                            <img src="{{ asset('storage/' . $project->image) }}" alt="project-image">
                        </div>

                        <div class="row g-4 justify-content-between">
                            <div class="col-lg-7">
                                <div class="details-content pt-5">
                                    <!-- Affiche le titre du projet dynamique -->
                                    <h3>{{ $project->title }}</h3>

                                    <!-- Affiche la description dynamique -->
                                    <p>
                                        {{ html_entity_decode(strip_tags($project->description)) }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="project-catagory">
                                    <h3>Project Info:</h3>
                                    <ul>
                                        <li>
                                            Client:
                                            <!-- Affiche le client du projet -->
                                            <span>Donfack</span>
                                        </li>
                                        <li>
                                            Category:
                                            <!-- Affiche la catégorie du projet -->
                                            <span>projet</span>
                                        </li>
                                        <li>
                                            Location:
                                            <!-- Affiche l'emplacement du projet -->
                                            <span>Localisation</span>
                                        </li>
                                        <li>
                                            Share:
                                            <span>
                                                <!-- Icônes de partage -->
                                                <i class="fa-brands fa-facebook-f me-3"></i>
                                                <i class="fa-brands fa-instagram me-3"></i>
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="details-content pt-5">
                            <h3>The Result of Project</h3>
                            <p>
                                Pellentesque egestas rutrum nibh facilisis ultrices. Phasellus in magna ut orci malesuada sollicitudin. Aenean faucibus scelerisque convallis. Quisque interdum mauris id nunc molestie, ac tincidunt erat gravida. Nullam dui libero, mollis ac quam et, venenatis tincidunt quam. Proin nec volutpat ligula, id porttitor augue. Proin id volutpat massa. Vivamus tincidunt nunc justo, ac aliquam ex molestie id.
                            </p>
                        </div>


                        <div id="otherProjectsCarousel" class="carousel slide pt-5" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($otherProjects->chunk(3) as $index => $projectChunk)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach($projectChunk as $other)
                                                <div class="col-md-4">
                                                    <div class="thumb text-center">
                                                        <img src="{{ asset('storage/' . $other->image) }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;" alt="img">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#otherProjectsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Précédent</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#otherProjectsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Suivant</span>
                            </button>
                        </div>



                    </div>
                    <div class="preview-area">
                        <div class="preview-item">
                            <img src="{{asset('assets/img/project/p-1.png')}}" alt="img">
                            <div class="content">
                                <h3>Preview</h3>
                                <p>Analytic Solutions</p>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="content text-right">
                                <h3>Next</h3>
                                <p>Software Development</p>
                            </div>
                            <img src="{{asset('assets/img/project/p-2.png')}}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
