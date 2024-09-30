@extends('frontOffice.template')

@section('blogs')

<div class="container mt-5">
    <h1 class="text-center">All Blogs</h1> <!-- Center the main heading -->
    <div class="text-center mb-4">
        <a href="{{ route('blogs.add') }}" class="btn btn-primary">Add New Blog</a> <!-- Link to addBlog page -->
    </div>
    @if($blogs->isEmpty())
    <div class="alert alert-warning">No blogs available.</div>
    @else
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-12 mb-4"> <!-- Full width column -->
            <div class="card">
                <div class="card-body text-center"> <!-- Center the text inside the card -->
                    <h5 class="card-title text-success">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->content }}</p> <!-- Full content -->
                    <p class="card-text"><small class="text-muted">{{ $blog->type }}</small> <small class="text-muted"> {{ $blog->blogDate }}</small></p>

                    <!-- Update and Delete Buttons -->
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning me-2">Update</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection
