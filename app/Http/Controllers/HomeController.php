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
                'slug' => 'emprendedurismo-intercultural',
                'name' => 'Tecnicatura Superior en Emprendedurismo',
                'summary' => 'Liderar la innovación comercial promoviendo el desarrollo sustentable.',
             
            ],
            [
                'slug' => 'comunitario-turismo',
                'name' => 'Tecnicatura Superior en Guía de Turismo Comunitario',
                'summary' => 'Informar, orientar, guiar a visitantes, protegiendo el patrimonio cultural y natural.',
              
            ],
            [
               'slug' => 'derechos-comunitario',
                'name' => 'Tecnicatura Superior en Derechos Humanos',
                'summary' => 'Formar profesionales capaces de promover, proteger y difundir los derechos humanos.',
           ],
           [
                'slug' => 'emergencias-y-salud-comunitario',
                'name' => 'Tecnicatura Superior en Gestión y Prevención de Emergencias',
                'summary' => 'Gestiona, previene, responde: ¡Lidera la protección de vidas y la comunidad!',
           ],
        ];

        return view('home', compact('featuredNews', 'featuredStories', 'libraryHighlights', 'careers'));
    }
}
