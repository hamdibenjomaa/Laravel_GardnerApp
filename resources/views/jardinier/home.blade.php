@extends('jardinier.template')

@section('home')

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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
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
                        <a class="btn btn-sm" href="{{ route('jardinier.index') }}"><i class="fa fa-plus text-primary me-2"></i>Savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection