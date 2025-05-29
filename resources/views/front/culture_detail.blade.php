@extends('front.layouts.app')

@section('content')
<div class="container my-5">

    <!-- Titre -->
    <h4 class="mb-4 text-center">{{ $culture->titre }}</h4>

    <!-- Images -->
    @if ($culture->image1 || $culture->image2)
        <div class="row mb-4">
            @if ($culture->image1)
                <div class="col-12 col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $culture->image1) }}" alt="{{ $culture->titre }}"
                         class="img-fluid rounded shadow-sm w-100" style="max-height: 300px; object-fit: cover;">
                </div>
            @endif
            @if ($culture->image2)
                <div class="col-12 col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $culture->image2) }}" alt="{{ $culture->titre }}"
                         class="img-fluid rounded shadow-sm w-100" style="max-height: 300px; object-fit: cover;">
                </div>
            @endif
        </div>
    @endif

    <!-- Description -->
    <p class="mb-5">{!! nl2br(e($culture->description)) !!}</p>

    <!-- Vidéos YouTube -->
    <div class="row">
        @php $videoId1 = getYoutubeVideoId($culture->lien_youtube1); @endphp
        @if ($videoId1)
            <div class="col-12 col-md-6 mb-4">
                <iframe class="w-100 rounded" style="height: 200px;"
                        src="https://www.youtube.com/embed/{{ $videoId1 }}"
                        title="Vidéo 1" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif

        @php $videoId2 = getYoutubeVideoId($culture->lien_youtube2); @endphp
        @if ($videoId2)
            <div class="col-12 col-md-6 mb-4">
                <iframe class="w-100 rounded" style="height: 200px;"
                        src="https://www.youtube.com/embed/{{ $videoId2 }}"
                        title="Vidéo 2" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif
    </div>

    <!-- Commentaires -->
    <section class="comments-area mt-5">
        <h3>{{ $culture->culturecommentaires ? $culture->culturecommentaires->count() : 0 }} Commentaire(s)</h3>

        @forelse($culture->culturecommentaires ?? [] as $comment)
            <div class="comment mb-4 p-3 border rounded bg-light">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ $comment->photo ? asset('storage/' . $comment->photo) : asset('assets/img/default-avatar.png') }}"
                         alt="avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 1rem;">
                    <div>
                        <strong>{{ $comment->auteur ?? 'Anonyme' }}</strong><br>
                        <small class="text-muted">{{ $comment->created_at->format('d M, Y \à H:i') }}</small>
                    </div>
                </div>
                <p class="mt-2">{{ $comment->contenu }}</p>
            </div>
        @empty
            <p>Aucun commentaire pour le moment.</p>
        @endforelse
    </section>

    <!-- Formulaire -->
    <section class="comment-form mt-5">
        <h3 class="mb-4">Laisser un commentaire</h3>
        <form action="{{ route('cultures.commentaire.store', $culture->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="auteur" class="form-label">Nom</label>
                <input type="text" name="auteur" id="auteur" class="form-control" value="{{ old('auteur') }}" placeholder="Votre nom (optionnel)">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo (optionnel)</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Message</label>
                <textarea name="contenu" id="contenu" rows="4" class="form-control" required>{{ old('contenu') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </section>

</div>
@endsection
