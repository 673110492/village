@extends('front.layouts.app')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
        <div class="border-shape">
            <img src="{{ asset('assets/img/element.png') }}" alt="shape-img">
        </div>
        <div class="line-shape">
            <img src="{{ asset('assets/img/line-element.png') }}" alt="shape-img">
        </div>
        <div class="container">
            <div class="page-heading text-center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Women Empowerment</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li>Empowerment</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Women Empowerment Section Start -->
    <section class="project-section section-padding fix">
        <div class="container">
            <div class="row gy-5">
                @forelse ($wemen as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay=".3s">
                        <div class="bg-white shadow-sm rounded-lg overflow-hidden h-100 d-flex flex-column p-3">

                            <h4 class="text-center text-dark fw-bold mb-3">
                                {{ $item->title }}
                            </h4>

                            <!-- Vidéo YouTube -->
                            @php
                                // Appel de la fonction helper (qui doit être définie ailleurs)
                                $videoId = getYoutubeVideoId($item->lien_youtube1);
                            @endphp

                            @if ($videoId)
                                <div class="mb-3">
                                    <iframe class="w-100 rounded" style="height: 200px;"
                                        src="https://www.youtube.com/embed/{{ $videoId }}" title="Vidéo YouTube"
                                        frameborder="0" allowfullscreen></iframe>
                                </div>
                            @endif

                            <!-- Image -->
                            @if ($item->image1)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $item->image1) }}" alt="Illustration"
                                        class="w-100 rounded" style="height: 200px; object-fit: cover;">
                                </div>
                            @endif

                            <p class="mt-3 text-sm text-gray-700">
                                {{ Str::words(strip_tags($item->description), 50, '...') }}
                            </p>

                            <div class="mt-auto text-center">
                                <a href="{{ route('women.show', $item->id) }}"
                                    class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                                    Voir plus <i class="fas fa-arrow-right"></i>
                                </a>

                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun programme trouvé.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
