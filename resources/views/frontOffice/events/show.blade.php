<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gardener - Gardening Website Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Page Header Start -->
    <header class="container-fluid page-header py-5 mb-5 wow fadeIn">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">{{ $event->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Event Details</li>
                </ol>
            </nav>
        </div>
    </header>
    <!-- Page Header End -->

    <main class="container mt-5">
        {{-- Display success and error messages --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $event->description }}</p>
                
                <h5 class="card-title">Date</h5>
                <p class="card-text">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>

                <h5 class="card-title">Location</h5>
                <p class="card-text">{{ $event->location }}</p>

                <h5 class="card-title">Max Participants</h5>
                <p class="card-text">{{ $event->max_participants }}</p>

                <h5 class="card-title">Status</h5>
                <p class="card-text">{{ $event->status }}</p>

                <h5 class="card-title">Created By</h5>
                <p class="card-text">{{ $event->user->name ?? 'Unknown' }}</p>

                <!-- Participate Button Form -->
                <form action="{{ route('events.participate', $event->id) }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="statut" value="inscrit"> <!-- Statut de participation -->
    @if($isParticipating)
        <button type="button" class="btn btn-secondary btn-sm" disabled>
            Vous participez déjà
        </button>
    @else
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fa fa-check me-2"></i>Participer
        </button>
    @endif
</form>


                <div class="mt-4">
                    <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Start -->
    <footer class="container-fluid bg-dark text-light footer mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    ...
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</body>
</html>
