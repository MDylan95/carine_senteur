<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Commande extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'quantite',
        'lieu_livraison',
        'lu'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'commande_articles')
            ->withPivot('quantite', 'prix_unitaire')
            ->withTimestamps();
    }

    protected $casts = [
        'lu' => 'boolean',
    ];
}
