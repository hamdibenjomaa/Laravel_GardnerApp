@extends('frontOffice.template')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Update Blog</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="thought" {{ old('type', $blog->type) == 'thought' ? 'selected' : '' }}>Thought</option>
                <option value="question" {{ old('type', $blog->type) == 'question' ? 'selected' : '' }}>Question</option>
                <option value="recommendation" {{ old('type', $blog->type) == 'recommendation' ? 'selected' : '' }}>Recommendation</option>
                <option value="advice" {{ old('type', $blog->type) == 'advice' ? 'selected' : '' }}>Advice</option>
                <option value="joke" {{ old('type', $blog->type) == 'joke' ? 'selected' : '' }}>Joke</option>
            </select>
            @error('type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Blog Image Update -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Show Current Blog Image if Available -->
        @if($blog->image)
        <div class="mb-3">
            <label class="form-label">Current Image:</label>
            <div>
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 200px;">
            </div>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>

@endsection
