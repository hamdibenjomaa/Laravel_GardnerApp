@extends('backOffice.template')

@section('show')
    <!-- Add New reservation Button -->
    <div class="me-3 my-3 text-end">
        <a href="{{ route('reservation.create') }}" class="btn btn-custom-add mb-0">
            <button class="btn-primary" style="
            display: flex; 
            align-items: center; 
            padding: 10px 15px; 
            background-color: #211254; /* Green color */
            color: #ffffff; 
            border: none; 
            border-radius: 5px; 
            font-weight: bold; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
            font-size: 16px;
        ">
            <i style="margin-right: 8px; font-size: 18px;"></i>Add</button>
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
                        <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-sm" style="background-color: #3498db; color: white; border: none;">
                            Edit
                        </a>
                        

                        <!-- Delete Form/Button -->
                        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border: none;" onclick="return confirm('Are you sure you want to delete this reservation?');">
                                <i class="fas fa-trash" style="margin-right: 5px;"></i> Delete
                            </button>
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

