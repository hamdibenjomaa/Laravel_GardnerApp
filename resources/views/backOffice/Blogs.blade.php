@extends('backOffice.template')

@section('blogs')

<div class="container mt-5">
    <h1 class="text-center">All Blogs</h1> <!-- Center the main heading -->

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

                        <form action="{{ route('blogs.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger ">
delete                            </button>
                        </form>
                    </div>

                    <!-- Add Comment Form -->


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
                                <form action="{{ route('comments.delete', [$blog->id, $comment->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger p-2">
                                        delete
                                    </button>
                                </form>
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
