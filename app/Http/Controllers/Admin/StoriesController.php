<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('stories', 'public');
            $data['featured_image'] = asset('storage/'.$path);
        }

        Story::create($data);

        return redirect()->route('admin.stories.index');
    }

    public function update(Request $request, Story $story)
    {
        $data = $this->validatedData($request, $story->id);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('stories', 'public');
            $data['featured_image'] = asset('storage/'.$path);
        }

        $story->update($data);

        return redirect()->route('admin.stories.index');
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
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ];

        $data = $request->validate($rules);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
