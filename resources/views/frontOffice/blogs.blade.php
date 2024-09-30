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
                    <p class="card-text"><small class="text-muted">{{ $blog->type }}</small> <small class="text-muted">{{ $blog->blogDate }}</small></p>

                    <!-- Update and Delete Icons for Blog -->
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
                            <div> <!-- Comment content on the left -->
                                <p class="mb-1">{{ $comment->content }} <small class="text-muted">Commented on {{ $comment->dateComment }}</small></p>
                            </div>

                            <!-- Update and Delete Icons on the same line as comment -->
                            <div class="d-flex">
                                <!-- Update Comment Icon -->
                                <button type="button" class="btn btn-link p-0 me-2" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
                                    <i class="fas fa-edit text-warning" title="Update"></i>
                                </button>

                                <!-- Delete Comment Icon -->
                                <form action="{{ route('comments.destroy', [$blog->id, $comment->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-trash text-danger" title="Delete"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Update Comment Modal -->
                            <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('comments.update', [$blog->id, $comment->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <textarea name="content" class="form-control" rows="2" required>{{ $comment->content }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
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
