@extends('backOffice.template')

@section('jardinier')
    <!-- Add New Jardinier Button -->
    <div class="me-3 my-3 text-end">
        <a href="{{ route('jardinier.create') }}" class="btn btn-custom-add mb-0">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Jardinier
        </a>
    </div>
        
    <div class="container mb-4">
        <form action="{{ route('jardinier.indexAdmin') }}" method="GET">
            <div class="input-group">
                <input type="text" id="search" name="search" class="form-control" placeholder="Search jardiniers by name, speciality, or location..." value="{{ request('search') }}" autocomplete="off">
                <div id="search-results" class="autocomplete-dropdown"></div>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <!-- Autocomplete Dropdown -->
        <ul id="search-suggestions" class="list-group"></ul>
    </div>

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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jardiniers as $jardinier)
                <tr>
                    <td>{{ $jardinier->id }}</td>
                    <td><a href="{{ route('jardinier.showAdmin', $jardinier->id) }}">{{ $jardinier->nom }}</a></td>
                    <td>{{ $jardinier->prenom }}</td>
                    <td>{{ $jardinier->telephone }}</td>
                    <td>{{ $jardinier->localisation }}</td>
                    <td>{{ $jardinier->horaire }}</td>
                    <td>{{ $jardinier->cout }}</td>
                    <td>{{ $jardinier->specialite }}</td>
                    <td class="action-buttons">
                        <!-- Edit Button -->
                        <a href="{{ route('jardinier.edit', $jardinier->id) }}" class="btn btn-sm" style="background-color: #3498db; color: white; border: none;">
                            <i class="fas fa-edit" style="margin-right: 5px;"></i> Edit
                        </a>
                        

                        <!-- Delete Form/Button -->
                        <form action="{{ route('jardinier.destroy', $jardinier->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border: none;" onclick="return confirm('Are you sure you want to delete this jardinier?');">
                                <i class="fas fa-trash" style="margin-right: 5px;"></i> Delete
                            </button>
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            // Handle dynamic autocomplete
            $('#search').on('input', function () {
                var query = $(this).val();

                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('jardinier.autocomplete') }}",
                        type: "GET",
                        data: { query: query },
                        success: function (data) {
                            $('#search-suggestions').empty();

                            if (data.length > 0) {
                                data.forEach(function (jardinier) {
                                    $('#search-suggestions').append('<li class="list-group-item">' + jardinier.nom + ' ' + jardinier.prenom + '</li>');
                                });
                            } else {
                                $('#search-suggestions').append('<li class="list-group-item">No results found</li>');
                            }
                        }
                    });
                } else {
                    $('#search-suggestions').empty();
                }
            });

            // Clicking a suggestion will populate the search field
            $(document).on('click', '.list-group-item', function () {
                var selected = $(this).text();
                $('#search').val(selected);
                $('#search-suggestions').empty();
            });
        });
    </script>
@endsection