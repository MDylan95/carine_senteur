<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carine Senteur</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('Images/logo.jpg') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet" />

    <!-- Ton fichier CSS -->
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/styles.css') }}" />
</head>

<body style="min-height:100vh;display:flex;flex-direction:column;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('accueil') }}">
                <img src="{{ asset('Images/logo.jpg') }}" alt="Logo Carine Senteur" style="height: 100px;">
                <span class="fw-bold" style="font-family: 'Playfair Display', serif;">Carine Senteur</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'accueil' ? 'active custom-active' : '' }}" href="{{ route('accueil') }}">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'articles' ? 'active custom-active' : '' }}" href="{{ route('articles') }}">
                            Nos articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'contact' ? 'active custom-active' : '' }}" href="{{ route('contact') }}">
                            Contactez-nous
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Marge haute pour compenser la navbar fixe -->
    <div style="padding-top: 70px;"></div>

    <!-- Contenu principal -->
    <main style="flex:1 0 auto;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-3 bg-dark text-white mt-5" style="flex-shrink:0;">
        <div class="container text-center">
            &copy; 2025 Carine Senteur - Tous droits réservés
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>