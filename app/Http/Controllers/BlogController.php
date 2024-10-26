<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::query();

        // Filter by type if provided
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // Filter by date if provided
        if ($request->filled('date')) {
            $query->whereDate('blogDate', $request->input('date'));
        }

        $blogs = $query->get(); // Retrieve filtered blogs from the database

        // Get unique blog types for the filter dropdown
        $types = Blog::distinct()->pluck('type');

        return view('frontOffice.blogs', compact('blogs', 'types')); // Pass the blogs and types to the view
    }

    public function getBlogs()
    {
        $blogs = Blog::all(); // Retrieve all blogs from the database
        return view('backOffice.blogs', compact('blogs')); // Pass the blogs to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontOffice.addBlog'); // Correct view path
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public'); // Store image in 'blog_images' folder
        }

        // Create a new blog post
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->type = $request->input('type');
        $blog->blogDate = now();
        $blog->image = $imagePath; // Save the image path
        $blog->save();

        return redirect()->route('frontOffice.blogs')->with('success', 'Blog added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontOffice.updateBlog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath;
        }

        // Update the blog's attributes
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->type = $request->input('type');

        // Save the changes
        $blog->save();

        return redirect()->route('frontOffice.blogs')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('frontOffice.blogs')->with('success', 'Blog deleted successfully');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('backOffice.blogs')->with('success', 'Blog deleted successfully');
    }
}
