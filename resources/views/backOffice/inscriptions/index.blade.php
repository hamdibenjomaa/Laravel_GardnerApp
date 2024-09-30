@extends('backOffice.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Inscriptions</h2>

    @if($inscriptions->isEmpty())
        <div class="alert alert-warning">No inscriptions found.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Formation</th>
                    <th>Numero</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $inscription->formation->name }}</td>
                        <td>{{ $inscription->numero }}</td>
                        <td>{{ $inscription->email }}</td>
                        <td>
                        <form action="{{ route('inscriptions.accept', $inscription->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to accept this inscription?');">Accept</button>
</form>

                            <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this inscription?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
