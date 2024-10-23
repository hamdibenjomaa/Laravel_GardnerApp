@extends('backOffice.template')

@section('show')
    <!-- Add New reservation Button -->
    <div class="me-3 my-3 text-end">
        <a href="{{ route('reservation.create') }}" class="btn btn-custom-add mb-0">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New reservation
        </a>
    </div>

    <!-- reservation Table -->
    <div class="container">
        <table class="table align-items-center mb-0 table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>description_service</th>
                    <th>date réservation</th>
                    <th>client</th>
                    <th>reference</th>
                    <th>jardinier_id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td><a href="{{ route('reservation.show', $reservation->id) }}">{{ $reservation->id }}</td>
                    <td><a href="{{ route('reservation.show', $reservation->id) }}">{{ $reservation->description_service }}</a></td>
                    <td><a href="{{ route('reservation.show', $reservation->id) }}">{{ $reservation->date_réservation }}</td>
                    <td>{{ $reservation->client }}</td>
                    <td>{{ $reservation->reference }}</td>
                    <td>{{ $reservation->jardinier->nom }}</td>
                    <td class="action-buttons">
                        <!-- Edit Button -->
                        <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-edit btn-sm">
                            <i class="fas fa-edit"></i>Edit
                        </a>

                        <!-- Delete Form/Button -->
                        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this reservation?');">
                                <i class="fas fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

