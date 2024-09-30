@extends('frontOffice.template')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Update Blog</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
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
            <select class="form-control" id="type" name="type" value="{{ old('type', $blog->type) }}" required>
                <option value="thought">Thought</option>
                <option value="question">Question</option>
                <option value="recommendation">Recommendation</option>
                <option value="advice">Advice</option>
                <option value="joke">Joke</option>
            </select>
            @error('type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>

@endsection
