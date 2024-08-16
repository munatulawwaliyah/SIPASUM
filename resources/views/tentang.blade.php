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
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
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
                            <a href="{{'berita'}}" class="nav-item nav-link">Berita</a>
                            <a href="{{'daftarperumahan'}}" class="nav-item nav-link">Daftar Perumahan</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Serah Terima PSU</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="" class="dropdown-item">Panduan</a>
                                    <a href="{{ $formatDanPersyaratan ? Storage::url($formatDanPersyaratan->file_path) : '#' }}" class="dropdown-item" target="_blank">Format dan Persyaratan</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tentang Hukum</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ $UU ? Storage::url($UU->file_path) : '#' }}" class="dropdown-item" target="_blank">Undang-Undang</a>
                                    <!-- Dropdown for Peraturan Pemerintah with hidden submenu -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Peraturan Pemerintah</a>
                                            <a href="{{ $PP14 ? Storage::url($PP14->file_path) : '#' }}" class="dropdown-item" target="_blank" class="dropdown-item">Nomor 14 Tahun 2016</a>
                                            <a href="{{ $PP64 ? Storage::url($PP64->file_path) : '#' }}" class="dropdown-item" target="_blank" class="dropdown-item">Nomor 64 Tahun 2016</a>
                                    </div>
                                    <a href="{{ $Permen ? Storage::url($Permen->file_path) : '#' }}" class="dropdown-item" target="_blank" class="dropdown-item">Peraturan Menteri</a>
                                    <a href="{{ $Perda ? Storage::url($Perda->file_path) : '#' }}" class="dropdown-item" target="_blank" class="dropdown-item">Peraturan Daerah</a>
                                    <a href="{{ $Perbup ? Storage::url($Perbup->file_path) : '#' }}" class="dropdown-item" target="_blank" class="dropdown-item">Peraturan Bupati</a>
                                </div>
                            </div>
                            <a href="{{'tentang'}}" class="nav-item nav-link active">Tentang</a>
                        </div>
                            <a href="login" class="my-auto"><i class="fas fa-user fa-2x"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- 404 Start -->
        <div class="container my-2 main-content">
        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h1 class="display-1 text-primary">SIPASUM</h1>
                        <h5 class="mb-4">Sistem Informasi Prasarana Sarana dan Utilitas Umum</h5>
                        <p class="row mb-4 text-justify"> 
                        Aplikasi SIPASUM (Sistem Informasi Prasarana Sarana dan Utilitas Umum) adalah aplikasi pelayanan publik yang dilaksanakan oleh bidang ( Perumahan Rakyat dan Kawasan Permukiman) Dinas PUTRLH Kabupaten Tasikmalaya 
                        untuk mempermudah pelayanan Pengesahan Site Plan Perumahan dan Pelayanan Penyerahan PSU (Prasarana Sarana dan Utilitas Umum) Perumahan guna mendukung terlaksananya program dan kegiatan diarahkan yang sesuai dengan 
                        Visi Kabupaten Tasikmalaya "Dengan Semangat Gotong Royong, Mewujudkan Kabupaten Tasikmalaya Yang Religius/Islami, Berdaya Saing, Dan Sejahtera"khususnya pada Misi ke-2 yaitu “Mewujudkan pemerintahan yang melayani, 
                        bersih,dan professional ” pada misi ini berkaitan dengan komitmen pemerintah untukmemberikan pelayanan publik kepada masyarakat dalam penyediaan, pengelolaandan pemeliharaan Prasarana, Sarana dan Utilitas (PSU) 
                        Perumahan agar terpeliharapada saat PSU Perumahan tersebut telah diserah terimakan oleh pengembangkepada pemerintah daerah dan Misi ke-4 “Mewujudkan iklim investasi yang kondusifdalam upaya mendorong pengembangan wilayah, 
                        dunia usaha dan penciptaanlapangan kerja melalui pengembangan kerjasama skala Lokal, Nasional, Regional,dan Global” pada misi ini berkaitan penyediaan informasi yang jelas dan regulasiyang bersifat sistematis dan mampu mengakomodir perihal penyediaan,
                        pengelolaan dan pemeliharaan perihal PSU agar dapat meningkatkan daya tarikinvestasi di sektor pengembangan perumahan dan kawasan permukiman diKabupaten Tasikmalaya
                        </p>
                        <p class="row mb-4 text-justify">
                        Pembuatan Aplikasi SIPASUM merupakan karya inovasi dari Staff dan Kepala Bidang Serta Kepala Dinas Perumahan PUTRLH Kabupaten Tasikmalaya dalam rangka implementasi aksi 
                        perubahan guna menyelesaikan kegiatan yang ada di Bidang Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tasikmalaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- 404 End -->

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


       
