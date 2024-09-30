<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all(); // Retrieve all blogs from the database
        return view('frontOffice.blogs', compact('blogs')); // Pass the blogs to the view
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
            'content' => 'required|string', // Ensure content is required
            'type' => 'required|string|max:50', // Adjust as necessary
        ]);

        // Create a new blog post
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content'); // Ensure this is not null
        $blog->type = $request->input('type');
        $blog->blogDate = now(); // Set the date or retrieve from the form
        $blog->save();

        return redirect()->route('frontOffice.blogs')->with('success', 'Blog added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Update the blog's attributes
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->type = $request->input('type');

        // Save the changes
        $blog->save();

        // Redirect back to the blogs list with a success message
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
}
