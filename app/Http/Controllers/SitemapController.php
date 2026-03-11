<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\News;
use App\Models\Story;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $urls = collect([
            route('home'),
            route('institution'),
            route('careers'),
            route('stories.index'),
            route('news.index'),
            route('library.index'),
            route('graduates.index'),
            route('contact'),
        ]);

        $storyUrls = Story::query()->pluck('slug')->map(fn ($slug) => route('stories.show', $slug));
        $newsUrls = News::query()->pluck('slug')->map(fn ($slug) => route('news.show', $slug));
        $graduateUrls = Graduate::query()->pluck('id')->map(fn ($id) => route('graduates.show', $id));

        $urls = $urls->merge($storyUrls)->merge($newsUrls)->merge($graduateUrls);

        $xml = view('sitemap', compact('urls'));

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
