<div class="card-body">
    <p><strong>ID:</strong> {{ $reservation->id }}</p>
    <p><strong>description service:</strong> {{ $reservation->description_service }}</p>
    <p><strong>Date réservation:</strong> {{ $reservation->date_réservation }}</p>
    <p><strong>client:</strong> {{ $reservation->client }}</p>
    <p><strong>feedback:</strong> {{ $reservation->feedback }}</p>
    <p><strong>reference:</strong> {{ $reservation->reference }}</p>
    <p><strong>jardinier_id:</strong> {{ $reservation->jardinier_id }}</p>
</div>