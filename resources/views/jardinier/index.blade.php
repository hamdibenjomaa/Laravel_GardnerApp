@extends('jardinier.template')

@section('jardinier')
 

    <!-- Jardinier Table -->
    <div class="container">
        <table class="table align-items-center mb-0 table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Tel</th>
                    <th>Localisation</th>
                    <th>Horaire</th>
                    <th>Cout</th>
                    <th>Specialite</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
@endsection