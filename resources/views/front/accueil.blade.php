@extends('Front.layout.index')

@section('content')
<section id="accueil" class="position-relative py-5">
    <div class="accueil-text-container text-center mb-4">
        <h1>MYSTÈRE, LUXE ET TRADITION...</h1>
        <p>RESPIREZ<br>L'ORIENT AVEC CARINE SENTEUR</p>
        <a href="{{ route('front.articles') }}" class="btn btn-primary">Voir nos parfums</a>
    </div>

    <div class="marquee-container border-top border-bottom py-3 bg-light overflow-hidden">
        <div class="marquee-text">
            Nous proposons la vente de parfums en gros et au détail, pour hommes et femmes, avec des senteurs boisées, fruitées, florales, oud et musquées.
        </div>
    </div>
</section>

<style>
    
</style>

<!-- Grille d'images stylisée -->
<section class="image-grid-section py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @foreach ($articles as $article)
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 h-100">
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->titre }}" style="object-fit: cover; height: 260px;">
                    <div class="card-body text-center">
                        <h6 class="card-title fw-semibold mb-2">{{ $article->titre }}</h6>
                        <a href="{{ route('front.articles') }}" class="btn btn-sm btn-outline-dark">Voir plus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceSection = document.querySelector('.animated-service');

        function revealOnScroll() {
            const rect = serviceSection.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top <= windowHeight * 0.85) {
                serviceSection.classList.add('visible');
                window.removeEventListener('scroll', revealOnScroll);
            }
        }

        window.addEventListener('scroll', revealOnScroll);
        revealOnScroll(); // check immediately on load
    });
</script>
@endsection