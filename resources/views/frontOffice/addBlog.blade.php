@extends('frontOffice.template')

@section('addBlog')

<div class="container mt-5">
    <h1 class="text-center">Add New Blog</h1>

    <!-- Ensure the form supports file upload with enctype -->
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Blog Title Input -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <!-- Blog Content Input -->
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <!-- Blog Type Selection -->
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="thought">Thought</option>
                <option value="question">Question</option>
                <option value="recommendation">Recommendation</option>
                <option value="advice">Advice</option>
                <option value="joke">Joke</option>
            </select>
        </div>

        <!-- Blog Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit and Back Buttons -->
        <button type="submit" class="btn btn-success">Add Blog</button>
        <a href="{{ route('frontOffice.blogs') }}" class="btn btn-secondary">Back to Blogs</a>
    </form>
</div>

@endsection
