@foreach ($jardiniers as $jardinier)
<tr>
    <td>{{ $jardinier->id }}</td>
    <td><a href="{{ route('jardinier.show', $jardinier->id) }}">{{ $jardinier->nom }}</a></td>
    <td>{{ $jardinier->prenom }}</td>
    <td>{{ $jardinier->telephone }}</td>
    <td>{{ $jardinier->localisation }}</td>
    <td>{{ $jardinier->horaire }}</td>
    <td>{{ $jardinier->cout }}</td>
    <td>{{ $jardinier->specialite }}</td>
</tr>
@endforeach

@if($jardiniers->isEmpty())
<tr>
    <td colspan="8" class="text-center">No jardiniers found</td>
</tr>
@endif
