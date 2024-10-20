<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-6 col-md-8 col-sm-12">
        <head>
            <meta charset="utf-8">
            <title>Gardener - Gardening Website Template</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">
        
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
        
            <!-- Quote Start -->
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <p class="fs-5 fw-bold text-primary">Free Quote</p>
                        <h1 class="display-5 mb-5">Get A Free Quote</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="gname" placeholder="Guardian Name">
                                            <label for="gname">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" id="gmail" placeholder="Guardian Email">
                                            <label for="gmail">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">
                                            <label for="cname">Your Mobile</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">
                                            <label for="cage">Service Type</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary py-3 px-4" type="submit">Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quote End -->
        
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <form action="{{ route('jardinier.store') }}" method="POST" class="p-5 bg-light shadow-lg rounded">
                        @csrf
        
                        <h2 class="text-center mb-4">Ajouter un nouveau Jardinier</h2>
        
                        <!-- Nom -->
                        <div class="form-group mb-4">
                            <label for="nom" class="form-label">Nom du jardinier</label>
                            <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Entrez le nom" required>
                        </div>
        
                        <!-- Prenom -->
                        <div class="form-group mb-4">
                            <label for="prenom" class="form-label">Prénom du jardinier</label>
                            <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="Entrez le prénom" required>
                        </div>
        
                        <!-- Telephone -->
                        <div class="form-group mb-4">
                            <label for="telephone" class="form-label">Téléphone du jardinier</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" placeholder="Entrez le numéro de téléphone" required>
                        </div>
        
                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label">Email du jardinier</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Entrez l'email" required>
                        </div>
        
                        <!-- Adresse -->
                        <div class="form-group mb-4">
                            <label for="adresse" class="form-label">Adresse du jardinier</label>
                            <input type="text" id="adresse" name="adresse" class="form-control form-control-lg" placeholder="Entrez l'adresse" required>
                        </div>
        
                        <!-- Description -->
                        <div class="form-group mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control form-control-lg" placeholder="Entrez la description" rows="4" required></textarea>
                        </div>
        
                        <!-- Image -->
                        <div class="form-group mb-4">
                            <label for="image" class="form-label">Image du jardinier</label>
                            <input type="file" id="image" name="image" class="form-control form-control-lg" required>
                        </div>
        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Ajouter le jardinier</button>
                        </div>
                    </form>
                </div>
            </div>
        
            <!-- Footer Start -->
            <div class="container-fluid bg-dark text-light mt-5 pt-5">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-light mb-4">Company</h5>
                            <p><a class="text-light" href="#">About Us</a></p>
                            <p><a class="text-light" href="#">Contact Us</a></p>
                            <p><a class="text-light" href="#">Our Services</a></p>
                            <p><a class="text-light" href="#">Terms of Use</a></p>
                            <p><a class="text-light" href="#">Privacy Policy</a></p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-light mb-4">Quick Links</h5>
                            <p><a class="text-light" href="#">Home</a></p>
                            <p><a class="text-light" href="#">Services</a></p>
                            <p><a class="text-light" href="#">Projects</a></p>
                            <p><a class="text-light" href="#">Blog</a></p>
                            <p><a class="text-light" href="#">Contact</a></p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-light mb-4">Newsletter</h5>
                            <div class="position-relative">
                                <input class="form-control border-0 rounded-pill ps-4 pe-5" type="text" placeholder="Your email">
                                <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 mt-1 me-1">Sign Up</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="text-light mb-4">Follow Us</h5>
                            <div class="d-flex">
                                <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        
            <!-- Back to Top -->
            <a href="#" class="btn btn-primary btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        
            <!-- JavaScript Libraries -->
            <script src="lib/wow/wow.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/lightbox/js/lightbox.min.js"></script>
        
            <!-- Template JavaScript -->
            <script src="js/main.js"></script>
        </body>