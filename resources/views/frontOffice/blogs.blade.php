@extends('frontOffice.template')

@section('blogs')

<div class="container mt-5">
    <h1 class="text-center">All Blogs</h1>

    <div class="text-center mb-4">
        <a href="{{ route('blogs.add') }}" class="btn btn-primary">Add New Blog</a>
    </div>

    <!-- Filter Form -->
    <form action="{{ route('frontOffice.blogs') }}" method="GET" class="mb-4 text-center">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <select name="type" class="form-select">
                    <option value="">All Types</option>
                    @foreach($types as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    @if($blogs->isEmpty())
    <div class="alert alert-warning">No blogs available.</div>
    @else
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->content }}</p>
                    <p class="card-text"><small class="text-muted">{{ $blog->type }}</small> <small class="text-muted">{{ $blog->blogDate }}</small></p>
                </div>

                @if($blog->image)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid blog-image" alt="Blog Image">
                </div>
                @endif

                <div class="card-body">
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="me-2">
                            <i class="fas fa-edit text-warning" title="Update"></i>
                        </a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0">
                                <i class="fas fa-trash text-danger" title="Delete"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Add Comment Form -->
                    <div class="mt-4">
                        <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="2" placeholder="Add a comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>

                    <!-- Display Comments -->
                    @if($blog->comments->isNotEmpty())
                    <div class="mt-3">
                        <h6 class="text-muted">Comments:</h6>
                        @foreach($blog->comments as $comment)
                        <div class="comment mb-2 d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-1">{{ $comment->content }} <small class="text-muted">Commented on {{ $comment->dateComment }}</small></p>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-link p-0 me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                                    <i class="fas fa-edit text-warning" title="Update"></i>
                                </button>

                                <form action="{{ route('comments.destroy', [$blog->id, $comment->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-trash text-danger" title="Delete"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Update Comment Modal -->
                            <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCommentModalLabel{{ $comment->id }}">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('comments.update', [$blog->id, $comment->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <textarea name="content" class="form-control" rows="2" required>{{ $comment->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection
