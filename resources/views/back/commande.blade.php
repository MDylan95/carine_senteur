@extends('back.dashboard')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-primary">Mes Commandes</h2>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width: 3%;">#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Lieu de Livraison</th>
                    <th>Date</th>
                    <th>Articles</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                <tr class="align-middle">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $commande->nom }}</td>
                    <td>{{ $commande->prenom }}</td>
                    <td>{{ $commande->telephone }}</td>
                    <td>{{ $commande->lieu_livraison }}</td>
                    <td>{{ $commande->created_at->format('d M Y à H:i') }}</td>
                    <td>
                        @if ($commande->articles->isNotEmpty())
                        <ul class="list-unstyled mb-0 d-flex flex-wrap gap-2">
                            @foreach ($commande->articles as $article)
                            <li class="d-flex align-items-center" style="min-width: 150px;">
                                <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/default.png') }}"
                                    alt="Image de l'article"
                                    class="img-thumbnail me-2"
                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                <span class="small fw-semibold">{{ $article->titre }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <span class="text-muted small fst-italic">Non trouvé</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary mb-1 w-100 voir-btn"
                            data-nom="{{ $commande->nom }}"
                            data-prenom="{{ $commande->prenom }}"
                            data-telephone="{{ $commande->telephone }}"
                            data-quantite="{{ $commande->quantite }}"
                            data-lieu="{{ $commande->lieu_livraison }}"
                            data-articles='@json($commande->articles->map(fn($a) => [
                                    "titre" => $a->titre,
                                    "image" => $a->image ? asset("storage/" . $a->image) : asset("images/default.png")
                                ]))'>
                            👀 Voir
                        </button>

                        <button class="btn btn-sm btn-danger w-100 supprimer-btn" data-id="{{ $commande->id }}">
                            🗑 Supprimer
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $commandes->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.voir-btn').forEach(button => {
        button.addEventListener('click', function() {
            const nom = this.dataset.nom;
            const prenom = this.dataset.prenom;
            const telephone = this.dataset.telephone;
            const quantite = this.dataset.quantite;
            const lieu = this.dataset.lieu;
            const articles = JSON.parse(this.dataset.articles);

            let htmlContent = articles.map(article => `
                <div class="mb-2 d-flex align-items-center gap-3">
                    <img src="${article.image}" alt="Image de l'article" class="rounded" style="max-width: 150px; max-height: 100px; object-fit: cover;">
                    <div><strong>Article :</strong> ${article.titre}</div>
                </div>
            `).join('');

            htmlContent += `
                <hr>
                <strong>Nom :</strong> ${nom}<br>
                <strong>Prénom :</strong> ${prenom}<br>
                <strong>Téléphone :</strong> ${telephone}<br>
                <strong>Quantité :</strong> ${quantite}<br>
                <strong>Lieu de livraison :</strong> ${lieu}<br>
            `;

            Swal.fire({
                title: 'Détails de la commande',
                html: htmlContent,
                confirmButtonText: 'Fermer'
            });
        });
    });

    document.querySelectorAll('.supprimer-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const btn = this;

            Swal.fire({
                title: 'Supprimer la commande ?',
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/administrateur/commandes/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Supprimé!', data.message, 'success');
                                btn.closest('tr').remove();
                            } else {
                                Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                            }
                        });
                }
            });
        });
    });
</script>

@endsection