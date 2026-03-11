<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->latest('published_at')->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.news.create', compact('categories', 'tags'));
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.news.edit', compact('news', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('news', 'public');
            $data['featured_image'] = asset('storage/'.$path);
        }

        $news = News::create($data);

        if (! empty($data['tags'] ?? null)) {
            $news->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.news.index');
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validatedData($request, $news->id);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('news', 'public');
            $data['featured_image'] = asset('storage/'.$path);
        }

        $news->update($data);

        if (! empty($data['tags'] ?? null)) {
            $news->tags()->sync($data['tags']);
        } else {
            $news->tags()->detach();
        }

        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }

    protected function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:news,slug'.($ignoreId ? ','.$ignoreId : '')],
            'news_category_id' => ['nullable', 'exists:news_categories,id'],
            'content' => ['required', 'string'],
            'video_url' => ['nullable', 'url'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer', 'exists:tags,id'],
        ];

        $data = $request->validate($rules);

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['title']);
        }

        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
