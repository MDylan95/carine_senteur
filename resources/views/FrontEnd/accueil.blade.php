@extends('FrontEnd.index')

@section('content')
<section id="accueil">
    <div class="accueil-text-container">
        <h1>L'ESSENCE DU LUXE</h1>
        <p>Des parfums uniques pour des personnalités uniques.</p>
        <a href="{{ route('articles') }}" class="btn btn-primary">Voir nos parfums</a>
    </div>
</section>

<!-- Grille d'images stylisée -->
<section class="image-grid-section">
    <div class="image-grid-wrapper">
        <img src="{{ asset('Images/couverture1.jpg') }}" alt="Parfum 1">
        <img src="{{ asset('Images/couverture2.jpg') }}" alt="Parfum 2">
        <img src="{{ asset('Images/couverture3.jpg') }}" alt="Parfum 3">
        <img src="{{ asset('Images/couverture1.jpg') }}" alt="Parfum 4">
    </div>
</section>
@endsection