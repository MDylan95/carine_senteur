<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => ['required', 'string', 'regex:/^\+?[0-9\s\-]{7,15}$/'],
            'lieu_livraison' => 'required|string|max:255',
            'contenu_panier' => 'required|string', // JSON contenant le panier complet
        ]);

        // Création de la commande (quantité totale sera calculée depuis le panier)
        $commande = Commande::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'telephone' => $validated['telephone'],
            'lieu_livraison' => $validated['lieu_livraison'],
            'quantite' => 0, // initialisation
        ]);

        // Décodage du panier JSON
        $panier = json_decode($validated['contenu_panier'], true);

        $quantiteTotale = 0;

        foreach ($panier as $articleId => $details) {
            $commande->articles()->attach($articleId, [
                'quantite' => $details['quantite'],
                'prix_unitaire' => $details['prix'],
            ]);
            $quantiteTotale += $details['quantite'];
        }

        // Mise à jour de la quantité totale sur la commande
        $commande->update(['quantite' => $quantiteTotale]);

        return redirect()->back()->with('commande_success', 'Votre commande a été enregistrée avec succès.');
    }

    public function index()
    {
        $commandes = Commande::with('articles')->latest()->paginate(10);
        return view('back.commande', compact('commandes'));
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);

        // Détacher les articles associés (si relation many-to-many)
        $commande->articles()->detach();

        $commande->delete();

        return response()->json([
            'success' => true,
            'message' => 'Commande supprimée avec succès.',
        ]);
    }
}
