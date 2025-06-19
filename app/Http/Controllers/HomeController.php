<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(4)->get(); // les 4 derniers
        return view('front.accueil', compact('articles'));
    }

    public function tousLesArticles(Request $request)
    {
        $query = Article::query();

        if ($request->filled('genre')) {
            if ($request->genre === 'homme' || $request->genre === 'femme') {
                $query->whereIn('genre', [$request->genre, 'neutre']);
            } elseif ($request->genre === 'neutre') {
                $query->where('genre', 'neutre');
            }
        }

        $articles = $query->latest()->paginate(9);

        return view('front.article', compact('articles'));
    }
}
