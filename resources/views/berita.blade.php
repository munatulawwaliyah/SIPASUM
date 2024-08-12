<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>SIPASUM</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="img/LOGO SIPASUM.png" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Jl. Raya Mangunreja-Sukapura Km. 1.200</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">sipasum@Example.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="" class="navbar-brand">
                    <img src="img/LOGO_KAB_TASIKMALAYA.png" alt="Logo" class="logo" style="height: 50px; width: 50 px;">
                    <img src="img/LOGO SIPASUM.png" alt="Logo" class="logo" style="height: 50px; width: 50 px;">
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{('/')}}" class="nav-item nav-link">Beranda</a>
                            <a href="" class="nav-item nav-link">Berita</a>
                            <a href="{{'daftarperumahan'}}" class="nav-item nav-link">Daftar Perumahan</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Serah Terima PSU</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="" class="dropdown-item">Panduan</a>
                                    <a href="" class="dropdown-item">Format dan Persyaratan</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Hukum</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="" class="dropdown-item">Undang-Undang</a>
                                    <a href="" class="dropdown-item">Peraturan Pemerintah</a>
                                    <a href="" class="dropdown-item">Peraturan Menteri</a>
                                    <a href="" class="dropdown-item">Peraturan Daerah</a>
                                    <a href="" class="dropdown-item">Peraturan Bupati</a>
                                </div>
                            </div>
                            <a href="" class="nav-item nav-link">Tentang</a>
                        </div>
                            <a href="login" class="my-auto"><i class="fas fa-user fa-2x"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


       <!-- Main Post Section Start -->
        <div class="container my-5 main-content">
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="row g-4">
                        <!-- Main Post -->
                        <div class="col-lg-7 col-xl-8 mt-0">
                            <div class="position-relative overflow-hidden rounded">
                                <img src="uploads/{{ $berita->gambar }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{ $berita->tanggal }}</a>
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{ $berita->views }} Views</a>
                                </div>
                            </div>
                            <div class="border-bottom py-3">
                                <a href="#" class="display-4 text-dark mb-0 link-hover">{{ $berita->judul }}</a>
                            </div>
                            <p class="mt-3 mb-4">{{ $berita->deskripsi }}</p>
                            <!-- Additional Stories -->
                            <div class="bg-light p-4 rounded">
                                <div class="news-2">
                                    <h3 class="mb-4">Top Story</h3>
                                </div>
                                @foreach ($otherBeritas as $item)
                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-6">
                                            <div class="rounded overflow-hidden">
                                                <img src="uploads/{{ $item->gambar }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h3">{{ $item->headline }}</a>
                                                <p class="mb-0 fs-5"><i class="fa fa-clock"> {{ $item->tanggal }}</i></p>
                                                <p class="mb-0 fs-5"><i class="fa fa-eye"> {{ $item->views }} Views</i></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Sidebar -->
                        <div class="col-lg-5 col-xl-4">
                            <div class="bg-light rounded p-4 pt-0">
                                <div class="row g-4">
                                    @foreach ($sidebarBeritas as $item)
                                        <div class="col-12">
                                            <div class="rounded overflow-hidden">
                                                <img src="uploads/{{ $item->gambar }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex flex-column">
                                                <a href="#" class="h4 mb-2">{{ $item->judul }}</a>
                                                <p class="fs-5 mb-0"><i class="fa fa-clock"> {{ $item->tanggal }}</i></p>
                                                <p class="fs-5 mb-0"><i class="fa fa-eye"> {{ $item->views }} Views</i></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Post Section End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">SIPASUM</h1>
                                <p class="text-secondary mb-0">Kabupaten Tasikmalaya</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 1429 Netus Rd, NY 48247</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: +0123 4567 8910</p>
                            <p>Payment Accepted</p>
                            <img src="" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>


       