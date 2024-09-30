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
        <td>{{ $jardinier->nom }}</td>
        <td>{{ $jardinier->prenom }}</td>
        <td>{{ $jardinier->telephone }}</td>
        <td>{{ $jardinier->localisation }}</td>
        <td>{{ $jardinier->horaire }}</td>
        <td>{{ $jardinier->cout }}</td>
        <td>{{ $jardinier->specialite }}</td>
    </tr>
    @endforeach
    </tbody>
</table>