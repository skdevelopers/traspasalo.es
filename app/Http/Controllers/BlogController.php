<?php 

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll(){
        $blogs = Blog::all();
        return view('front.blog', compact('blogs'));
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'required|image',
        ]);

        $blog = Blog::create($request->only('title', 'description', 'date'));

        if ($request->hasFile('image')) {
            $blog->addMedia($request->file('image'))->toMediaCollection('blogs');
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('front.blog_detail', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|image',
        ]);

        $blog->update($request->only('title', 'description', 'date'));

        if ($request->hasFile('image')) {
            $blog->clearMediaCollection('images');
            $blog->addMedia($request->file('image'))->toMediaCollection('blogs');
        }

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->clearMediaCollection('blogs');
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
