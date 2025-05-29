@extends('front.layouts.app')

@section('content')
<div class="container my-5">

    <!-- Titre -->
    <h2 class="mb-4 text-center text-primary fw-bold">{{ $item->title }}</h2>

    <!-- Date -->
    @if ($item->start_date)
        <p class="text-center text-muted mb-4">
            <i class="far fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($item->start_date)->format('d/m/Y') }}
        </p>
    @endif

    <!-- Images -->
    @if ($item->image1 || $item->image2)
        <div class="row mb-4">
            @if ($item->image1)
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $item->image1) }}" alt="Image 1"
                         class="img-fluid rounded shadow-sm w-100"
                         style="max-height: 300px; object-fit: cover;">
                </div>
            @endif
            @if ($item->image2)
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $item->image2) }}" alt="Image 2"
                         class="img-fluid rounded shadow-sm w-100"
                         style="max-height: 300px; object-fit: cover;">
                </div>
            @endif
        </div>
    @endif

    <!-- Description -->
    @if ($item->description)
        <div class="mb-4">
            <h5 class="text-dark fw-bold mb-2">Description</h5>
            <p>{!! nl2br(e($item->description)) !!}</p>
        </div>
    @endif

    <!-- Édition -->
    @if ($item->edition)
        <div class="mb-4">
            <h5 class="text-dark fw-bold mb-2">Édition</h5>
            <p>{{ $item->edition }}</p>
        </div>
    @endif

    <!-- Vidéos YouTube -->
    @php
        $videoId1 = getYoutubeVideoId($item->lien_youtube1);
        $videoId2 = getYoutubeVideoId($item->lien_youtube2);
    @endphp

    @if ($videoId1 || $videoId2)
        <div class="row mb-4">
            @if ($videoId1)
                <div class="col-md-6 mb-3">
                    <iframe class="w-100 rounded"
                            style="height: 250px;"
                            src="https://www.youtube.com/embed/{{ $videoId1 }}"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
            @if ($videoId2)
                <div class="col-md-6 mb-3">
                    <iframe class="w-100 rounded"
                            style="height: 250px;"
                            src="https://www.youtube.com/embed/{{ $videoId2 }}"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
        </div>
    @endif

</div>
@endsection
