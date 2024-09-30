<table class="table align-items-center mb-0">
    <thead>
    <tr>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            ID
        </th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            nom</th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            prenom</th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            tel</th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            localisation</th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            horaire</th>
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
            cout</th>
       
        <th
            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
            specialite</th>
                  </tr>
    </thead>
    <tbody>
    @foreach ($jardiniers as $jardinier)
    <tr>
        <td>{{ $jardinier->id }}</td>
        <td><a href="{{ route('jardinier.show', $jardinier->id) }}">{{ $jardinier->nom }}</td>
        <td>{{ $jardinier->prenom }}</td>
        <td>{{ $jardinier->telephone }}</td>
        <td>{{ $jardinier->localisation }}</td>
        <td>{{ $jardinier->horaire }}</td>
        <td>{{ $jardinier->cout }}</td>
        <td>{{ $jardinier->specialite }}</td>
        <td>
            <a href="{{ route('jardinier.edit', $jardinier->id) }}" class="btn btn-warning btn-sm">Edit</a> 
            <form action="{{ route('jardinier.destroy', $jardinier->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this jardinier?');">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>