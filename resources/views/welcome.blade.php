<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NUANSA UMKM</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('design/assets/favicon.ico') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet" />
        <!-- Core theme CSS -->
    <link href="{{ asset('design/css/styles.css') }}" rel="stylesheet" />

</head>
<body>

    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">NUANSA UMKM</span>
            <span class="site-heading-lower">Menemukan Keindahan Setiap Sudut Kota</span>
        </h1>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="#home">Nuansa UMKM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#home">Beranda</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#about">Tentang Kami</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#products">UMKM</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/admin/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="page-section clearfix">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('design/assets/img/intro.jpg') }}" alt="Intro" />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">NUANSA UMKM</span>
                    </h2>
                    <p class="mb-3">
                        Selamat datang di Nuansa UMKM — tempat kami memperkenalkan kekayaan produk dan jasa lokal dari setiap sudut kota.
                    </p>
                    <div class="intro-button mx-auto">
                        <a class="btn btn-primary btn-xl" href="#products">Jelajahi!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('design/assets/img/about.jpg') }}" alt="About" />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">Tentang Nuansa</span>
                            </h2>
                            <p>
                                Nuansa UMKM hadir sebagai solusi untuk membantu kamu menemukan UMKM terdekat, mendukung ekonomi lokal, dan menikmati produk unik dari para pelaku usaha kecil di sekitarmu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    
                                <!-- Products Section -->
                <section id="products" class="page-section">
                    <div class="container">
                        <!-- Judul Produk -->
                        <h2 class="section-heading mb-4 text-center">
                                    <span class="section-heading-upper" style="font-size:2.2rem; color: #e6a756;">Produk UMKM Unggulan</span>
                                    <span class="section-heading-lower d-block mt-2" style="font-size:1.1rem; color: #555;">Temukan produk-produk terbaik dari pelaku UMKM lokal</span>
                                </h2>
                                <div class="row">
                                    @foreach($umkms as $umkm)
                                        <div class="col-md-4 mb-4">
                                            <div class="card h-100">
                                                @if($umkm->foto)
                                                    <img src="{{ asset('storage/'.$umkm->foto) }}" class="card-img-top umkm-img" alt="{{ $umkm->nama }}">
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $umkm->nama }}</h5>
                                                    <p class="card-text">{{ $umkm->alamat }}</p>
                                                    <p class="card-text mb-1"><strong>Pemilik:</strong> {{ $umkm->pemilik }}</p>
                                                    <p class="card-text mb-1"><strong>Modal:</strong> {{ number_format($umkm->modal,0,',','.') }}</p>
                                                    <p class="card-text mb-1"><strong>Kab/Kota:</strong> {{ $umkm->kabkota->nama ?? '-' }}</p>
                                                    <p class="card-text mb-1"><strong>Kategori:</strong> {{ $umkm->kategoriUmkm->nama ?? '-' }}</p>
                                                    <p class="card-text mb-1"><strong>Pembina:</strong> {{ $umkm->pembina->nama ?? '-' }}</p>
                                                    <p class="card-text mb-1"><strong>Rating:</strong>
                                                        <span style="color: #FFD700;">
                                                            @for($i=1; $i<=5; $i++)
                                                                {!! $i <= $umkm->rating ? '&#9733;' : '&#9734;' !!}
                                                            @endfor
                                                        </span>
                                                        <small>({{ $umkm->rating }}/5)</small>
                                                    </p>
                                                    <p class="card-text mb-1"><strong>Website:</strong>
                                                        <a href="{{ $umkm->website }}" target="_blank">{{ $umkm->website }}</a>
                                                    </p>
                                                    <p class="card-text mb-1"><strong>Email:</strong> {{ $umkm->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                    </div>
                </section>

    

    <!-- Team Section -->
    <section id="team" class="page-section">
        <div class="container">
            <h2 class="section-heading mb-4 text-center">
                <span class="section-heading-upper" style="font-size:2.2rem; color: #e6a756;">Tim Kami</span>
            </h2>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('design/assets/img/amarsya.jpg') }}" class="card-img-top rounded-circle mx-auto mt-4" alt="Anggota 1" style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Amarsya Swastika Aulia</h5>
                            <p class="card-text">Teknik Informatika</p>
                            <p class="card-text"><small class="text-muted">0110224159</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('design/assets/img/adit.jpg') }}" class="card-img-top rounded-circle mx-auto mt-4" alt="Anggota 2" style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Muhammad Aditia</h5>
                            <p class="card-text">Teknik Informatika</p>
                            <p class="card-text"><small class="text-muted">0110224213</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('design/assets/img/elsi.jpg') }}" class="card-img-top rounded-circle mx-auto mt-4" alt="Anggota 3" style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Elsi Novitasari</h5>
                            <p class="card-text">Teknik Informatika</p>
                            <p class="card-text"><small class="text-muted">0110224026</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Team Section -->

<!-- Footer -->
<footer class="footer text-faded text-center py-5">
    <div class="container">
        <!-- Copyright -->
        <p class="m-0 small">Copyright &copy; Nuansa UMKM</p>

        <!-- Alamat -->
        <p class="mt-2 mb-0 small">
            <strong>Alamat Kami:</strong><br>
            Jl. Sukarno Hatta No. 101, Kota Malang<br>
            Provinsi Jawa Timur, Indonesia
        </p>

        <!-- Kontak Tambahan (Opsional) -->
        <p class="mt-2 mb-0 small">
            <strong>Email:</strong> info@nuansaumkm.id<br>
            <strong>Telepon:</strong> +62 812-3456-7890
        </p>
    </div>
</footer>