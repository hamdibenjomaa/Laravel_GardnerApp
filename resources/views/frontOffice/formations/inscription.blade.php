@extends('frontOffice.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Inscription for Formation</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('inscriptions.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="formation" class="form-label">Select Formation</label>
                    <select class="form-select" id="formation" name="formation_id" required>
                        <option value="" disabled selected>Select a formation</option>
                        @foreach($formations as $formation)
                            <option value="{{ $formation->id }}">{{ $formation->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numero" class="form-label">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Enter your numero" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Inscrire</button>
            </form>
        </div>
    </div>
</div>
@endsection
