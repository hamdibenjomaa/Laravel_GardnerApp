<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        // Validate the comment input
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Create the comment
        $blog->comments()->create([
            'content' => $request->input('content'),
            'dateComment' => now(),
        ]);

        // Redirect back to the blogs page with a success message
        return redirect()->back()->with('success', 'Comment added successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an existing comment
    public function update(Request $request, Blog $blog, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    // Delete a comment
    public function destroy(Blog $blog, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
