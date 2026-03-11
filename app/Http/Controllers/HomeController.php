<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;
use App\Models\News;
use App\Models\Story;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredNews = News::query()->where('is_featured', true)->latest('published_at')->take(3)->get();
        $featuredStories = Story::query()->where('is_featured', true)->latest('published_at')->take(3)->get();
        $libraryHighlights = LibraryItem::query()->latest('published_at')->take(3)->get();

        $careers = [
            [
                'slug' => 'educacion-intercultural',
                'name' => 'Tecnicatura en Educación Intercultural',
                'summary' => 'Formación docente con enfoque comunitario.',
            ],
            [
                'slug' => 'gestion-cultural',
                'name' => 'Tecnicatura en Gestión Cultural',
                'summary' => 'Promoción del patrimonio y la diversidad.',
            ],
            [
                'slug' => 'turismo-comunitario',
                'name' => 'Tecnicatura en Turismo Comunitario',
                'summary' => 'Turismo sostenible con identidad territorial.',
            ],
        ];

        return view('home', compact('featuredNews', 'featuredStories', 'libraryHighlights', 'careers'));
    }
}
