@extends('frontOffice.template')

@section('addBlog')

<div class="container mt-5">
    <h1 class="text-center">Add New Blog</h1>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

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


<br>
        <button type="submit" class="btn btn-success">Add Blog</button>
        <a href="{{ route('frontOffice.blogs') }}" class="btn btn-secondary">Back to Blogs</a>
    </form>
</div>

@endsection
