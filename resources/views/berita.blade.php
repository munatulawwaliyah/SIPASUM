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
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Jl. Raya Mangunreja-Sukaraja Km. 1.200</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">dputrprkplh@tasikmalayakab.go.id</a></small>
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
                            <a href="{{'berita'}}" class="nav-item nav-link active">Berita</a>
                            <a href="{{'daftarperumahan'}}" class="nav-item nav-link">Daftar Perumahan</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Serah Terima PSU</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ $Panduan ? Storage::url($Panduan->file_path) : '#' }}" class="dropdown-item" target="_blank">Panduan</a>
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
                            <a href="{{'tentang'}}" class="nav-item nav-link">Tentang</a>
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
                                <img src="uploads/{{ $beritas->gambar }}" class="img-fluid rounded img-zoomin w-100" alt="">
                                <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{ $beritas->tanggal }}</a>
                                    <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> {{ $beritas->views }} Views</a>
                                </div>
                            </div>
                            <div class="border-bottom py-3">
                                <a href="#" class="display-4 text-dark mb-0 link-hover" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $beritas->id }}">{{ $beritas->judul }}</a>
                            </div>
                            <p class="mt-3 mb-4">{{ $beritas->deskripsi }}</p>
                            
                            <!-- Modal for Main Post -->
                            <div class="modal fade" id="detailModal-{{ $beritas->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">{{ $beritas->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>{{$beritas->headline}}</strong></p>
                                            <p><strong>Tanggal:</strong> {{ $beritas->tanggal }}</p>
                                            <img src="uploads/{{ $beritas->gambar }}" class="img-fluid rounded mb-3" alt="">
                                            <p>{{ $beritas->deskripsi }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $item->id }}">{{ $item->headline }}</a>
                                                <p class="mb-0 fs-5"><i class="fa fa-clock"> {{ $item->tanggal }}</i></p>
                                                <p class="mb-0 fs-5"><i class="fa fa-eye"> {{ $item->views }} Views</i></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Additional Stories -->
                                    <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">{{ $item->judul }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>{{$item->headline}}</strong></p>
                                                    <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                                    <img src="uploads/{{ $item->gambar }}" class="img-fluid rounded mb-3" alt="">
                                                    <p>{{ $item->deskripsi }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
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
                                                <a href="#" class="h4 mb-2" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $item->id }}">{{ $item->judul }}</a>
                                                <p class="fs-5 mb-0"><i class="fa fa-clock"> {{ $item->tanggal }}</i></p>
                                                <p class="fs-5 mb-0"><i class="fa fa-eye"> {{ $item->views }} Views</i></p>
                                            </div>
                                        </div>

                                        <!-- Modal for Sidebar Items -->
                                        <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">{{ $item->judul }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>{{$item->headline}}</strong></p>
                                                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                                        <img src="uploads/{{ $item->gambar }}" class="img-fluid rounded mb-3" alt="">
                                                        <p>{{ $item->deskripsi }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
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
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://www.youtube.com/@dinasputrppkab.tasikmalaya9510" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="https://www.instagram.com/dputrprkplh?igsh=aDg5bm8zM3piZXR4" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                        <div class="footer-item">
                            <p class="mb-4">
                            SIPASUM merupakan karya inovasi dari Staff dan Kepala Bidang Serta Kepala Dinas Perumahan PUTRLH 
                            Kabupaten Tasikmalaya dalam rangka implementasi aksi perubahan guna menyelesaikan kegiatan 
                            yang ada di Bidang Perumahan Rakyat dan Kawasan Permukiman Kabupaten Tasikmalaya.</p>
                            <a href="{{'tentang'}}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-item">
                            <h5 class="text-primary mb-3">Contact</h5>
                            <p>Alamat: Jl. Raya Mangunreja-Sukaraja Km. 1.200 Kabupaten Tasikmalaya</p>
                            <p>Email: dputrprkplh@tasikmalayakab.go.id</p>
                            <p>Telephone: (0265) 548786 Fax: (0265) 548777</p>
                            <a href="https://dinasputrpp.tasikmalayakab.go.id/" class="text-white-50"><p>Website: https://dinasputrpp.tasikmalayakab.go.id</p></a>
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
                        <span class="text-light"><i class="fas fa-copyright text-light me-2"></i>2024, All right reserved.</span>
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


       