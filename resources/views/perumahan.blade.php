<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPASUM</title>
    <link href="img/LOGO SIPASUM.png" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('PERUMAHAN') }}
            </h2>
        </x-slot>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Card section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Perumahan</th>
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                                <th>Status</th>
                                                <th>Jumlah Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perumahans as $perumahan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $perumahan->nama_perumahan }}</td>
                                                <td>{{ $perumahan->desas->kecamatans->nama_kecamatan }}</td>
                                                <td>{{ $perumahan->desas->nama_desa }}</td>
                                                <td>{{ $perumahan->status_serah_terima_psu ? 'Sudah' : 'Belum' }}</td>
                                                <td>{{ $perumahan->jumlah_unit }}</td>
                                                <td>
                                                    <div class="justify-content-between">
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $perumahan->id }}">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $perumahan->id }}">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $perumahan->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#crudModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


    <!-- Modal Detail Start-->
    @foreach ($perumahans as $p)
    <div class="modal fade" id="detailModal-{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="detaiModalLabel-{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel-{{ $p->id }}">Detail Perumahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 300px;">
                                <img src="uploads/{{ $p->foto }}" alt="Foto Perumahan" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Nama Perumahan:</strong> {{ $p->nama_perumahan }}</p>
                                <p><strong>Kecamatan:</strong> {{ $p->desas->kecamatans->nama_kecamatan }}</p>
                                <p><strong>Desa:</strong> {{ $p->desas->nama_desa }}</p>
                                <p><strong>Nama Developer:</strong> {{ $p->nama_developer }}</p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 text-center bg-light p-2">Jenis PSU</div>
                            <div class="col-4 text-center bg-light p-2">Prasarana</div>
                            <div class="col-4 text-center bg-light p-2">Sarana</div>
                            <div class="col-4 text-center bg-light p-2">Utilitas</div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4 text-center">
                                @foreach ($p->prasaranas as $pra)
                                <p><strong>Jaringan Jalan: </strong> {{ $pra->jaringan_jalan ? $pra->jaringan_jalan . ' m2' : '-'}}</p>
                                <p><strong>Jaringan Drainase: </strong> {{ $pra->jaringan_drainase ? $pra->jaringan_drainase . ' m2' : '-'}}</p>
                                <p><strong>Jaringan Sanitasi: </strong> {{ $pra->jaringan_sanitasi ? $pra->jaringan_sanitasi . ' m2' : '-'}}</p>
                                <p><strong>Jaringan Persampahan: </strong>{{ $pra->jaringan_persampahan ? $pra->jaringan_persampahan . ' m2' : '-'}}</p>
                                <p><strong>Prasarana Lainya : <br> </strong>{{ $pra->jaringan_persampahan ?: '-'}}</p>
                                @endforeach
                            </div>
                            <div class="col-4 text-center">
                                @foreach ($p->saranas as $sar)
                                <p><strong> Peribadatan: </strong> {{ $sar->peribadahan }}</p>
                                <p><strong> Rekreasi & Olahraga: </strong> {{ $sar->rekreasi_dan_olahraga ? $sar->rekreasi_dan_olahraga . ' m2' : '-'}}</p>
                                <p><strong> Pertamanan & RTH: </strong> {{ $sar->pertamanan_dan_rth ? $sar->pertamanan_dan_rth . ' m2' : '-'}}</p>
                                <P><strong> Perniagaan: </strong> {{ $sar->perniagaan ? $sar->perniagaan . ' m2' : '-'}}</P>
                                <p><strong> Fasilitas Sosial: </strong> {{ $sar->fasilitas_sosial ? $sar->fasilitas_sosial . ' m2' : '-'}}</p>
                                <p><strong> Pendidikan: </strong> {{ $sar->pendidikan}}</p>
                                <p><strong> Kesehatan: </strong> {{ $sar->kesehatan ? $sar->kesehatan . ' m2' : '-'}}</p>
                                <p><strong> Pemakaman: </strong> {{ $sar->pemakaman ? $sar->pemakaman . ' m2' : '-'}}</p>
                                <p><strong> Parkir: </strong> {{ $sar->parkir ? $sar->parkir . ' m2' : '-'}}</p>
                                <p><strong> Pelayan Umum dan Pemerintahan: </strong> {{ $sar->pelayanan_umum_dan_pemerintahan}}</p>
                                <p><strong> Sarana Lainnya: <br> </strong> {{ $sar->sarana_lainnya ?: '-'}}</p>
                                @endforeach
                            </div>
                            <div class="col-4 text-center">
                                @foreach ($p->utilitas as $utl)
                                <p><strong>Penerangan: </strong> {{ $utl->jaringan_penerangan ? $utl->jaringan_penerangan . ' Unit' : '-'}}</p>
                                <p><strong>Air Bersih: </strong> {{ $utl->jaringan_air_bersih ?: '-'}}</p>
                                <p><strong>Listrik: </strong>{{ $utl->jaringan_listrik ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                                <p><strong>Telpon: </strong>{{ $utl->jaringan_telpon ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                                <p><strong>Pemadam Kebakaran: </strong>{{ $utl->jaringan_pemadam_kebakaran ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                                <p><strong>Gas: </strong>{{ $utl->gas ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                                <p><strong>Transportasi: </strong>{{ $utl->transportasi ? 'Tersedia' : 'Tidak Tersedia'}}</p>
                                @endforeach
                            </div>
                        </div>
                        <!-- Visual separator -->
                        <hr>
                        <div class="row my-3">
                            <div class="col-4 text-center bg-light p-2">Luas Perumahan: <br><strong>{{ $p->luas_lahan_perumahan }} m2</strong></div>
                            <div class="col-4 text-center bg-light p-2">Luas Lahan Non Efektif: <br><strong>{{ $p->luas_lahan_non_efektif }} m2</strong></div>
                            <div class="col-4 text-center bg-light p-2">Luas Lahan Efektif: <br><strong>{{ $p->luas_lahan_efektif }} m2</strong></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12">
                                <!-- Embed Google Maps iframe here -->
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $p->maps }}" frameborder="0" style="width: 100%; height: 200px;" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!-- Modal Detail End -->

    <!-- Modal Create Start -->
    <div class="modal fade" id="crudModal" tabindex="-1" aria-labelledby="crudModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel">Tambah Data Perumahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crudForm" action="{{ route('perumahan.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_perumahan" class="form-label">Nama Perumahan</label>
                            <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatans_id" class="form-label">Kecamatan</label>
                            <select id="kecamatans_id" class="form-select" name="kecamatans_id" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desas_id" class="form-label">Desa</label>
                            <select id="desas_id" class="form-select" name="desas_id" required>
                                <option value="">Pilih Desa</option>
                                <!-- Desa options will be populated based on selected Kecamatan -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_developer" class="form-label">Nama Developer</label>
                            <input type="text" class="form-control" id="nama_developer" name="nama_developer" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_perumahan" class="form-label">Luas Lahan Perumahan</label>
                            <input type="number" class="form-control" id="luas_lahan_perumahan" name="luas_lahan_perumahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_non_efektif" class="form-label">Luas Lahan Non Efektif</label>
                            <input type="number" class="form-control" id="luas_lahan_non_efektif" name="luas_lahan_non_efektif" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_efektif" class="form-label">Luas Lahan Efektif</label>
                            <input type="number" class="form-control" id="luas_lahan_efektif" name="luas_lahan_efektif" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_unit" class="form-label">Jumlah Unit</label>
                            <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" required>
                        </div>
                        <div class="mb-3">
                            <label>Status Serah Terima PSU</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status_serah_terima_psu" id="status_serah_terima_psu1" value="1" required>
                                    <label class="form-check-label" for="status_serah_terima_psu1">Sudah</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_serah_terima_psu" id="status_serah_terima_psu2" value="0" required>
                                    <label class="form-check-label" for="status_serah_terima_psu2">Belum</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="maps" class="form-label">Link Maps</label>
                            <input type="url" class="form-control" id="maps" name="maps" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div id="preview-container" class="mb-3"></div> <!-- Tempat untuk menampilkan pratinjau gambar -->
                            <input class="form-control" type="file" id="foto" name="foto[]" multiple required>
                            <div id="file-limit-error" class="text-danger d-none">Maksimal 5 foto dapat diunggah.</div>
                        </div>


                        <h5 class="mt-4">Prasarana</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="jaringan_jalan" class="form-label">Jaringan Jalan</label>
                                <input type="text" id="jaringan_jalan" class="form-control" name="jaringan_jalan" inputmode="string">
                            </div>
                            <div class="me-2">
                                <label for="jaringan_drainase" class="form-label">Jaringan Drainase</label>
                                <input type="text" id="jaringan_drainase" class="form-control" name="jaringan_drainase" inputmode="string">
                            </div>
                            <div class="me-2">
                                <label for="jaringan_sanitasi" class="form-label">Jaringan Sanitasi</label>
                                <input type="text" id="jaringan_sanitasi" class="form-control" name="jaringan_sanitasi" inputmode="string">
                            </div>
                            <div>
                                <label for="jaringan_persampahan" class="form-label">Jaringan Persampahan</label>
                                <input type="text" id="jaringan_persampahan" class="form-control" name="jaringan_persampahan" inputmode="string">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="prasarana_lainnya" class="form-label">Prasrana lainnya</label>
                            <input type="text" class="form-control" id="prasarana_lainnya" name="prasarana_lainnya" required>
                        </div>

                        <h5 class="mt-4">Sarana</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="peribadahan" class="form-label">Peribadatan</label>
                                <input type="text" id="peribadahan" class="form-control" name="peribadahan" inputmode="string" required>
                            </div>
                            <div class="me-2">
                                <label for="rekreasi_olahraga" class="form-label">Rekreasi dan Olahraga</label>
                                <input type="text" id="rekreasi_olahraga" class="form-control" name="rekreasi_olahraga" inputmode="string">
                            </div>
                            <div>
                                <label for="pertamanan_rth" class="form-label">Pertamanan dan RTH</label>
                                <input type="text" id="pertamanan_rth" class="form-control" name="pertamanan_rth" inputmode="string">
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="perniagaan" class="form-label">Perniagaan</label>
                                <input type="text" id="perniagaan" class="form-control" name="perniagaan" inputmode="string">
                            </div>
                            <div class="me-2">
                                <label for="fasilitas_sosial" class="form-label">Fasilitas Sosial</label>
                                <input type="text" id="fasilitas_sosial" class="form-control" name="fasilitas_sosial" inputmode="string">
                            </div>
                            <div>
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" id="pendidikan" class="form-control" name="pendidikan" inputmode="string" required>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="kesehatan" class="form-label">Kesehatan</label>
                                <input type="text" id="kesehatan" class="form-control" name="kesehatan" inputmode="string">
                            </div>
                            <div class="me-2">
                                <label for="pemakaman" class="form-label">Pemakaman</label>
                                <input type="text" id="pemakaman" class="form-control" name="pemakaman" inputmode="string">
                            </div>
                            <div>
                                <label for="parkir" class="form-label">Parkir</label>
                                <input type="text" id="parkir" class="form-control" name="parkir" inputmode="string">
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="pelayanan_umum_dan_pemerintahan" class="form-label">Pelayanan Umum dan Pemerintahan</label>
                                <input type="text" id="pelayanan_umum_dan_pemerintahan" class="form-control" name="pelayanan_umum_dan_pemerintahan" inputmode="string" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="sarana_lainnya" class="form-label">Sarana Lainnya</label>
                                <input type="text" class="form-control" id="sarana_lainnya" name="sarana_lainnya" required>
                            </div>
                        </div>

                        <h5 class="mt-4">Utilitas</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="jaringan_penerangan" class="form-label">Jaringan Penerangan</label>
                                <input type="text" id="jaringan_penerangan" class="form-control" name="jaringan_penerangan" inputmode="string">
                            </div>
                            <div>
                                <label for="jaringan_air_bersih" class="form-label">Jaringan Air Bersih</label>
                                <input type="text" id="jaringan_air_bersih" class="form-control" name="jaringan_air_bersih" inputmode="string">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Listrik</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_listrik" id="jaringan_listrik1" value="1" required>
                                    <label class="form-check-label" for="jaringan_listrik1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_listrik" id="jaringan_listrik2" value="0" required>
                                    <label class="form-check-label" for="jaringan_listrik2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Telepon</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_telpon" id="jaringan_telpon1" value="1" required>
                                    <label class="form-check-label" for="jaringan_telpon1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_telpon" id="jaringan_telpon2" value="0" required>
                                    <label class="form-check-label" for="jaringan_telpon2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Pemadam Kebakaran</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_pemadam_kebakaran" id="jaringan_pemadam_kebakaran1" value="1" required>
                                    <label class="form-check-label" for="jaringan_pemadam_kebakaran1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_pemadam_kebakaran" id="jaringan_pemadam_kebakaran2" value="0" required>
                                    <label class="form-check-label" for="jaringan_pemadam_kebakaran2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Gas</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="gas" id="gas1" value="1" required>
                                    <label class="form-check-label" for="gas1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gas" id="gas2" value="0" required>
                                    <label class="form-check-label" for="gas2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Transportasi</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="transportasi" id="transportasi1" value="1" required>
                                    <label class="form-check-label" for="transportasi1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transportasi" id="transportasi2" value="0" required>
                                    <label class="form-check-label" for="transportasi2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Create End -->

    <!-- Modal Update Start -->
    @foreach ($perumahans as $perumahan)
    <div class="modal fade" id="updateModal-{{ $perumahan->id }}" tabindex="-1" aria-labelledby="updateModalLabel-{{ $perumahan->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel-{{ $perumahan->id }}">Update Data Perumahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="crudForm" action="{{ route('perumahan.update', ['id'=> $perumahan->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_perumahan" class="form-label">Nama Perumahan</label>
                            <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan" value="{{ $perumahan->nama_perumahan}}">
                        </div>
                        <div class="mb-3">
                            <label for="kecamatans_id" class="form-label">Kecamatan</label>
                            <select id="kecamatans_id" class="form-select" name="kecamatans_id">
                                <option value="">Pilih Kecamatan</option>
                                @foreach($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="desas_id" class="form-label">Desa</label>
                            <select id="desas_id" class="form-select" name="desas_id">
                                <option value="">Pilih Desa</option>
                                <!-- Desa options will be populated based on selected Kecamatan -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_developer" class="form-label">Nama Developer</label>
                            <input type="text" class="form-control" id="nama_developer" name="nama_developer" value="{{ $perumahan->nama_developer}}">
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_perumahan" class="form-label">Luas Lahan Perumahan</label>
                            <input type="number" class="form-control" id="luas_lahan_perumahan" name="luas_lahan_perumahan" value="{{ $perumahan->luas_lahan_perumahan}}">
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_non_efektif" class="form-label">Luas Lahan Non Efektif</label>
                            <input type="number" class="form-control" id="luas_lahan_non_efektif" name="luas_lahan_non_efektif" value="{{ $perumahan->luas_lahan_non_efektif}}">
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan_efektif" class="form-label">Luas Lahan Efektif</label>
                            <input type="number" class="form-control" id="luas_lahan_efektif" name="luas_lahan_efektif" value="{{ $perumahan->luas_lahan_efektif}}">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_unit" class="form-label">Jumlah Unit</label>
                            <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" value="{{ $perumahan->jumlah_unit}}">
                        </div>
                        <div class="mb-3">
                            <label>Status Serah Terima PSU</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status_serah_terima_psu" id="status_serah_terima_psu1" value="1"
                                        {{ old('status_serah_terima_psu', isset($perumahan) ? $perumahan->status_serah_terima_psu : '') == '1' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="status_serah_terima_psu1">Sudah</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_serah_terima_psu" id="status_serah_terima_psu2" value="0"
                                        {{ old('status_serah_terima_psu', isset($perumahan) ? $perumahan->status_serah_terima_psu : '') == '0' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="status_serah_terima_psu2">Belum</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="maps" class="form-label">Link Maps</label>
                            <input type="url" class="form-control" id="maps" name="maps" value="{{$perumahan->maps}}">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div id="preview-container" class="mb-3"></div> <!-- Tempat untuk menampilkan pratinjau gambar -->
                            <input class="form-control" type="file" id="foto" name="foto[]" multiple required>
                            <div id="file-limit-error" class="text-danger d-none">Maksimal 5 foto dapat diunggah.</div>
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>
                        <!-- Prasarana Start -->
                        @foreach ($perumahan->prasaranas as $pra)
                        <h5 class="mt-4">Prasarana</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="jaringan_jalan" class="form-label">Jaringan Jalan</label>
                                <input type="text" id="jaringan_jalan" class="form-control" name="jaringan_jalan" inputmode="string" value="{{ $pra->jaringan_jalan}}">
                            </div>
                            <div class="me-2">
                                <label for="jaringan_drainase" class="form-label">Jaringan Drainase</label>
                                <input type="text" id="jaringan_drainase" class="form-control" name="jaringan_drainase" inputmode="string" value="{{$pra->jaringan_drainase}}">
                            </div>
                            <div class="me-2">
                                <label for="jaringan_sanitasi" class="form-label">Jaringan Sanitasi</label>
                                <input type="text" id="jaringan_sanitasi" class="form-control" name="jaringan_sanitasi" inputmode="string" value="{{$pra->jaringan_sanitasi}}">
                            </div>
                            <div>
                                <label for="jaringan_persampahan" class="form-label">Jaringan Persampahan</label>
                                <input type="text" id="jaringan_persampahan" class="form-control" name="jaringan_persampahan" inputmode="string" value="{{$pra->jaringan_persampahan}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="prasarana_lainnya" class="form-label">Prasrana lainnya</label>
                            <input type="text" class="form-control" id="prasarana_lainnya" name="prasarana_lainnya" value="{{$pra->prasarana_lainnya}}">
                        </div>
                        @endforeach
                        <!-- Sarana Start -->
                        @foreach ($perumahan->saranas as $sar)
                        <h5 class="mt-4">Sarana</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="peribadahan" class="form-label">Peribadatan</label>
                                <input type="text" id="peribadahan" class="form-control" name="peribadahan" inputmode="string" value="{{$sar->peribadahan}}">
                            </div>
                            <div class="me-2">
                                <label for="rekreasi_olahraga" class="form-label">Rekreasi dan Olahraga</label>
                                <input type="text" id="rekreasi_olahraga" class="form-control" name="rekreasi_olahraga" inputmode="string" value="{{$sar->rekreasi_olahraga}}">
                            </div>
                            <div>
                                <label for="pertamanan_rth" class="form-label">Pertamanan dan RTH</label>
                                <input type="text" id="pertamanan_rth" class="form-control" name="pertamanan_rth" inputmode="string" value="{{$sar->pertamanan_rth}}">
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="perniagaan" class="form-label">Perniagaan</label>
                                <input type="text" id="perniagaan" class="form-control" name="perniagaan" inputmode="string" value="{{$sar->perniagaan}}">
                            </div>
                            <div class="me-2">
                                <label for="fasilitas_sosial" class="form-label">Fasilitas Sosial</label>
                                <input type="text" id="fasilitas_sosial" class="form-control" name="fasilitas_sosial" inputmode="string" value="{{$sar->fasilitas_sosial}}">
                            </div>
                            <div>
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" id="pendidikan" class="form-control" name="pendidikan" inputmode="string" value="{{$sar->pendidikan}}">
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="kesehatan" class="form-label">Kesehatan</label>
                                <input type="text" id="kesehatan" class="form-control" name="kesehatan" inputmode="string" value="{{$sar->kesehatan}}">
                            </div>
                            <div class="me-2">
                                <label for="pemakaman" class="form-label">Pemakaman</label>
                                <input type="text" id="pemakaman" class="form-control" name="pemakaman" inputmode="string" value="{{$sar->pemakaman}}">
                            </div>
                            <div>
                                <label for="parkir" class="form-label">Parkir</label>
                                <input type="text" id="parkir" class="form-control" name="parkir" inputmode="string" value="{{$sar->parkir}}">
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="pelayanan_umum_dan_pemerintahan" class="form-label">Pelayanan Umum dan Pemerintahan</label>
                                <input type="text" id="pelayanan_umum_dan_pemerintahan" class="form-control" name="pelayanan_umum_dan_pemerintahan" inputmode="string" value="{{$sar->pelayanan_umum_dan_pemerintahan}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="sarana_lainnya" class="form-label">Sarana Lainnya</label>
                                <input type="text" class="form-control" id="sarana_lainnya" name="sarana_lainnya" value="{{$sar->sarana_lainnya}}">
                            </div>
                        </div>
                        @endforeach
                        <!-- Utilitas Start -->
                        @foreach ($perumahan->utilitas as $utl)
                        <h5 class="mt-4">Utilitas</h5>
                        <div class="d-flex mb-3">
                            <div class="me-2">
                                <label for="jaringan_penerangan" class="form-label">Jaringan Penerangan</label>
                                <input type="text" id="jaringan_penerangan" class="form-control" name="jaringan_penerangan" inputmode="string" value="{{$utl->jaringan_penerangan}}">
                            </div>
                            <div>
                                <label for="jaringan_air_bersih" class="form-label">Jaringan Air Bersih</label>
                                <input type="text" id="jaringan_air_bersih" class="form-control" name="jaringan_air_bersih" inputmode="string" value="{{$utl->jaringan_air_bersih}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Listrik</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_listrik" id="jaringan_listrik1" value="1"
                                        {{ old('jaringan_listrik', isset($utl) ? $utl->jaringan_listrik : '') == '1' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jaringan_listrik1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_listrik" id="jaringan_listrik2" value="0"
                                        {{ old('jaringan_listrik', isset($utl) ? $utl->jaringan_listrik : '') == '0' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jaringan_listrik2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Telepon</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_telpon" id="jaringan_telpon1" value="1"
                                        {{ old('jaringan_telpon', isset($utl) ? $utl->jaringan_telpon : '') == '1' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jaringan_telpon1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_telpon" id="jaringan_telpon2" value="0"
                                        {{ old('jaringan_telpon', isset($utl) ? $utl->jaringan_telpon : '') == '0' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jaringan_telpon2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Pemadam Kebakaran</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="jaringan_pemadam_kebakaran" id="jaringan_pemadam_kebakaran1" value="1" required>
                                    <label class="form-check-label" for="jaringan_pemadam_kebakaran1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jaringan_pemadam_kebakaran" id="jaringan_pemadam_kebakaran2" value="0" required>
                                    <label class="form-check-label" for="jaringan_pemadam_kebakaran2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Gas</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="gas" id="gas1" value="1" required>
                                    <label class="form-check-label" for="gas1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gas" id="gas2" value="0" required>
                                    <label class="form-check-label" for="gas2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Jaringan Transportasi</label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="transportasi" id="transportasi1" value="1" required>
                                    <label class="form-check-label" for="transportasi1">Tersedia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="transportasi" id="transportasi2" value="0" required>
                                    <label class="form-check-label" for="transportasi2">Tidak Tersedia</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Update End -->


    <!-- Modal Delete -->
    @foreach ($perumahans as $perumahan)
    <div class="modal fade" id="deleteModal-{{ $perumahan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $perumahan->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $perumahan->id }}">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data perumahan <strong>{{ $perumahan->nama_perumahan }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('perumahan.delete', $perumahan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach



    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="/js/desa.js"></script>
    <script>
        document.getElementById('foto').addEventListener('change', function() {
            const maxFiles = 5;
            const fileInput = this;
            const fileCount = fileInput.files.length;
            const previewContainer = document.getElementById('preview-container');
            const errorDiv = document.getElementById('file-limit-error');

            // Clear previous previews
            previewContainer.innerHTML = '';

            if (fileCount > maxFiles) {
                errorDiv.classList.remove('d-none');
                fileInput.value = ''; // Clear the input
            } else {
                errorDiv.classList.add('d-none');
                // Create previews
                Array.from(fileInput.files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '150px'; // Adjust size as needed
                            img.style.marginRight = '10px';
                            img.style.marginBottom = '10px';
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>

</body>

</html>