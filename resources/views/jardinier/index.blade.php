<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jardinier Management</title>
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  
 
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
     <!-- Libraries Stylesheet -->
     <link href="lib/animate/animate.min.css" rel="stylesheet">
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Template Stylesheet -->
     <link href="css/style.css" rel="stylesheet">

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
    
     <!-- Topbar Start -->
     <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span>+72 750 210</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span>Gerdener@gmail.com</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    
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
                <a href="{{ route('jardinier.index') }}" class="nav-item nav-link">Nos Equipes</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-2 px-lg-4 rounded-0 d-none d-lg-block">Sign In <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </nav>
 <!-- Navbar Ends -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Nos Equipes</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Jardiniers</a></li>
                    <li class="breadcrumb-item"><a href="#">Reservations</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

  <!-- Service Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Nos Services</p>
            <h1 class="display-5 mb-5">Les services que nous vous offrons</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-1.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Aménagement paysager</h4>
                        <p class="mb-4">Conception et création d'espaces extérieurs, y compris la planification de jardins, de pelouses, et d'espaces verts.</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-2.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-6.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Plantation et culture</h4>
                        <p class="mb-4"> Sélection, plantation et entretien des plantes, arbustes, arbres et fleurs.</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-3.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-5.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Gestion de l'irrigation </h4>
                        <p class="mb-4">Installation et entretien des systèmes d'arrosage automatique ou manuel</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-4.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-4.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Entretien des jardins </h4>
                        <p class="mb-4">Tonte de pelouses, taille des haies, désherbage, nettoyage des parterres de fleurs et élagage des arbres.</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-5.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-8.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Aménagement de potagers</h4>
                        <p class="mb-4">Création et entretien de potagers pour la culture de fruits et légumes.</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded d-flex h-100">
                    <div class="service-img rounded">
                        <img class="img-fluid" src="img/service-6.jpg" alt="">
                    </div>
                    <div class="service-text rounded p-5">
                        <div class="btn-square rounded-circle mx-auto mb-3">
                            <img class="img-fluid" src="img/icon/icon-2.png" alt="Icon">
                        </div>
                        <h4 class="mb-3">Soins des pelouses</h4>
                        <p class="mb-4">Fertilisation, scarification, et traitement des maladies du gazon.</p>
                        <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->




    <!-- Add New Jardinier Button -->
    <div class="me-3 my-3 text-end">
        <a href="{{ route('jardinier.create') }}" class="btn btn-custom-add mb-0">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Jardinier
        </a>
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
                    <td><a href="{{ route('jardinier.show', $jardinier->id) }}">{{ $jardinier->nom }}</a></td>
                    <td>{{ $jardinier->prenom }}</td>
                    <td>{{ $jardinier->telephone }}</td>
                    <td>{{ $jardinier->localisation }}</td>
                    <td>{{ $jardinier->horaire }}</td>
                    <td>{{ $jardinier->cout }}</td>
                    <td>{{ $jardinier->specialite }}</td>
                    <td class="action-buttons">
                        <!-- Edit Button -->
                        <a href="{{ route('jardinier.edit', $jardinier->id) }}" class="btn btn-edit btn-sm">
                            <i class="fas fa-edit"></i>Edit
                        </a>

                        <!-- Delete Form/Button -->
                        <form action="{{ route('jardinier.destroy', $jardinier->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this jardinier?');">
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
<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Nos Projects</p>
            <h1 class="display-5 mb-5">Quelques-uns de Nos Merveilleux Projets</h1>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline rounded mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">tous</li>
                    <li class="mx-2" data-filter=".first">Projets Complétés</li>
                    <li class="mx-2" data-filter=".second">Projets en Cours</li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-1.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Installation d'un système d'irrigation automatique </h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-2.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Conception d'un potager urbain </h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-3.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Réhabilitation d’un espace vert public</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-4.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Aménagement d’un jardin de pluie</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-4.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-5.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Transformation d’un jardin en espace à biodiversité</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-5.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="img/service-6.jpg" alt="">
                    <div class="portfolio-text">
                        <h4 class="text-white mb-4">Création d’un jardin méditerranéen </h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-6.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square rounded-circle mx-2" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->
 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Notre Bureau</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ariena, Tunis, Tunisie</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+72 750 210</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Gerdener@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Services</h4>
                <a class="btn btn-link" href="">Landscaping</a>
                <a class="btn btn-link" href="">Pruning plants</a>
                <a class="btn btn-link" href="">Urban Gardening</a>
                <a class="btn btn-link" href="">Garden Maintenance</a>
                <a class="btn btn-link" href="">Green Technology</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


</html>
