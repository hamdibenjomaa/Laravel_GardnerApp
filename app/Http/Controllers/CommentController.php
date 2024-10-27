<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Blog $blog)
    {
        // Validate the comment input and image
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('comment_images', 'public'); // Store image in 'comment_images' folder
        }

        // Create the comment
        $blog->comments()->create([
            'content' => $request->input('content'),
            'dateComment' => now(),
            'image' => $imagePath, // Save the image path
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog, Comment $comment)
    {
        // Validate the comment and image
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('comment_images', 'public');
            $comment->image = $imagePath;
        }

        // Update the comment
        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function delete(Blog $blog, Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
