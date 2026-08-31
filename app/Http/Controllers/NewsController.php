<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'  => 'required|in:published,draft',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'user_id' => auth()->id(),
            'title'   => $request->title,
            'slug'    => Str::slug($request->title) . '-' . Str::random(5),
            'excerpt' => Str::limit(strip_tags($request->content), 150),
            'content' => $request->content,
            'image'   => $imagePath,
            'status'  => $request->status,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News published successfully!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'  => 'required|in:published,draft',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $news->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title) . '-' . Str::random(5),
            'excerpt' => Str::limit(strip_tags($request->content), 150),
            'content' => $request->content,
            'image'   => $imagePath,
            'status'  => $request->status,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully!');
    }
}