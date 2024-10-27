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

    <!-- Plain JavaScript for Autocomplete -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const suggestionsList = document.getElementById('search-suggestions');
            const jardinierList = document.getElementById('jardinier-list');
            const form = document.querySelector('form');
    
            // Handle dynamic autocomplete
            searchInput.addEventListener('input', function () {
                const query = searchInput.value;
    
                if (query.length > 2) {
                    fetch(`{{ route('jardinier.autocomplete') }}?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestionsList.innerHTML = ''; // Clear previous suggestions
                            
                            if (data.length > 0) {
                                data.forEach(jardinier => {
                                    const listItem = document.createElement('li');
                                    listItem.textContent = `${jardinier.nom} ${jardinier.prenom}`;
                                    listItem.classList.add('list-group-item');
                                    suggestionsList.appendChild(listItem);
                                });
                            } else {
                                const noResultsItem = document.createElement('li');
                                noResultsItem.textContent = 'No results found';
                                noResultsItem.classList.add('list-group-item');
                                suggestionsList.appendChild(noResultsItem);
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                } else {
                    suggestionsList.innerHTML = ''; // Clear the suggestions when input is too short
                }
            });
    
            // When a suggestion is clicked, fill the search input and clear suggestions
            suggestionsList.addEventListener('click', function (event) {
                if (event.target && event.target.matches('li.list-group-item')) {
                    searchInput.value = event.target.textContent;
                    suggestionsList.innerHTML = ''; // Clear suggestions
                }
            });
    
            // Handle form submission dynamically (AJAX)
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
    
                const query = searchInput.value;
    
                fetch(`{{ route('jardinier.index') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    jardinierList.innerHTML = data.html; // Update the table with the new content
                })
                .catch(error => {
                    console.error('Error fetching dynamic search data:', error);
                });
            });
        });
    </script>
    
@endsection
