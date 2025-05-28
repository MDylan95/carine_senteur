@extends('FrontEnd.index')
@section('content')

<section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-2" style="font-family: 'Playfair Display', serif; font-size: 2rem;">

        </h2>
        <h2 class="text-center fw-bold mb-2" style="font-family: 'Playfair Display', serif; font-size: 2rem;">
            Contactez-nous
        </h2>

        <!-- Texte rassurant stylé sous le titre -->
        <p class="text-center text-muted mb-4" style="font-size: 1.05rem; font-style: italic;">
            Contactez-nous en cas de besoin, nous sommes à votre écoute.
        </p>

        <div class="row justify-content-center align-items-center">
            <!-- Colonne du logo -->
            <div class="col-md-4 mb-4 mb-md-0 text-center">
                <img src="{{ asset('Images/logo.jpg') }}" alt="Logo Carine Senteur" class="img-fluid rounded-3 shadow" style="max-height: 250px;">
                <p class="mt-3 fw-medium text-muted" style="font-size: 1rem; font-style: italic;">
                    "Un parfum, une émotion, un souvenir... Parlons de vos envies !"
                </p>
            </div>

            <!-- Colonne du formulaire -->
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4 border-0 p-4 bg-white">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nom complet</label>
                            <input type="text" class="form-control rounded-3" id="name" placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label fw-semibold">Numéro de téléphone (WhatsApp de préférence)</label>
                            <input type="text" class="form-control rounded-3" id="text" placeholder="+225 00 00 00 00 00" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold">Message</label>
                            <textarea class="form-control rounded-3" id="message" rows="4" placeholder="Votre message..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection