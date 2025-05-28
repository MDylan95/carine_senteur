@extends('FrontEnd.index')
@section('content')

<section id="articles" class="py-4 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold" style="font-family: 'Playfair Display', serif; font-size: 1.8rem;">Nos Articles</h2>
        <div class="row g-3 justify-content-center">
            <!-- Article 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-3 mx-auto" style="max-width: 300px;">
                    <div class="bg-white p-2 rounded-top-3" style="height: 220px; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('Images/couverture1.jpg') }}" class="img-fluid" alt="Parfum Floral" style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="card-body text-center p-2">
                        <h6 class="card-title fw-bold mb-1">Parfum Floral</h6>
                        <p class="card-text text-muted small mb-1">Une fragrance légère et fraîche aux notes florales délicates.</p>
                        <p class="text-primary fw-semibold mb-2" style="font-size: 0.95rem;">15 000 FCFA</p>
                        <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Commander</a>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-3 mx-auto" style="max-width: 300px;">
                    <div class="bg-white p-2 rounded-top-3" style="height: 220px; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('Images/couverture1.jpg') }}" class="img-fluid" alt="Parfum Boisé" style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="card-body text-center p-2">
                        <h6 class="card-title fw-bold mb-1">Parfum Boisé</h6>
                        <p class="card-text text-muted small mb-1">Une senteur chaude et mystérieuse inspirée des forêts profondes.</p>
                        <p class="text-primary fw-semibold mb-2" style="font-size: 0.95rem;">18 000 FCFA</p>
                        <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Commander</a>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-3 mx-auto" style="max-width: 300px;">
                    <div class="bg-white p-2 rounded-top-3" style="height: 220px; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('Images/couverture1.jpg') }}" class="img-fluid" alt="Parfum Fruité" style="max-height: 100%; object-fit: contain;">
                    </div>
                    <div class="card-body text-center p-2">
                        <h6 class="card-title fw-bold mb-1">Parfum Fruité</h6>
                        <p class="card-text text-muted small mb-1">Un mélange pétillant aux arômes de fruits rouges et d’agrumes.</p>
                        <p class="text-primary fw-semibold mb-2" style="font-size: 0.95rem;">16 500 FCFA</p>
                        <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection