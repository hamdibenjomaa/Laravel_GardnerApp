<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Custom CSS for table */
        .table th {
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05rem;
            color: #6c757d;
        }

        .table td {
            vertical-align: middle;
        }

        /* Button Styles */
        .btn-custom-add {
            background-color: #28a745; /* Green */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom-add:hover {
            background-color: #218838; /* Darker Green */
        }

        .btn-edit {
            background-color: #ffc107; /* Yellow */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #e0a800; /* Darker Yellow */
        }

        .btn-delete {
            background-color: #dc3545; /* Red */
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c82333; /* Darker Red */
        }

        .btn-sm {
            margin-right: 5px; /* Add spacing between buttons */
        }

        .action-buttons form {
            display: inline-block;
        }
    </style>
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">Gardener</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">Blog</a>
                <a href="service.html" class="nav-item nav-link">Formation</a>
                <a href="project.html" class="nav-item nav-link">Nos Partenaires</a>
                <a href="project.html" class="nav-item nav-link">Evenements</a>
                <a href="{{ route('reservation.index') }}" class="nav-item nav-link">Nos Equipes</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-2 px-lg-4 rounded-0 d-none d-lg-block">Sign In <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </nav>

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
                    <th>feedback</th>
                    <th>reference</th>
                    <th>jardinier_id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td><a href="{{ route('reservation.show', $reservation->id) }}">{{ $reservation->description_service }}</a></td>
                    <td>{{ $reservation->date_réservation }}</td>
                    <td>{{ $reservation->client }}</td>
                    <td>{{ $reservation->feedback }}</td>
                    <td>{{ $reservation->reference }}</td>
                    <td>{{ $reservation->jardinier_id }}</td>
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

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
