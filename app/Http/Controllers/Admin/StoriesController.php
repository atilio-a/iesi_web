<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::query()->latest('published_at')->get();

        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['author_id'] = Auth::id();
        $data['featured_image'] = $this->storeFeaturedImage($request);

        $story = Story::create($data);

        return redirect()
            ->route('admin.stories.edit', $story)
            ->with('status', 'Historia creada correctamente.');
    }

    public function update(Request $request, Story $story)
    {
        $data = $this->validatedData($request, $story->id);

        if ($request->hasFile('featured_image')) {
            $this->deleteFeaturedImage($story->featured_image);
            $data['featured_image'] = $this->storeFeaturedImage($request);
        }

        $story->update($data);

        return redirect()
            ->route('admin.stories.edit', $story)
            ->with('status', 'Imagen e información actualizadas correctamente.');
    }

    public function destroy(Story $story)
    {
        $story->delete();

        return redirect()->route('admin.stories.index');
    }

    protected function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $rules = [
            'type' => ['required', 'in:docente,egresado,comunidad'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:stories,slug'.($ignoreId ? ','.$ignoreId : '')],
            'content' => ['required', 'string'],
            'video_url' => ['nullable', 'url'],
            'audio_url' => ['nullable', 'url'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ];

        $request->validate([
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
        ]);

        $data = $request->validate($rules);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }

    protected function storeFeaturedImage(Request $request): ?string
    {
        if (! $request->hasFile('featured_image')) {
            return null;
        }

        return $request->file('featured_image')->store('stories', 'public');
    }

    protected function deleteFeaturedImage(?string $url): void
    {
        if (! $url) {
            return;
        }

        $prefix = asset('storage/');
        $path = str_starts_with($url, $prefix)
            ? Str::after($url, $prefix)
            : $url;

        Storage::disk('public')->delete($path);
    }
}
