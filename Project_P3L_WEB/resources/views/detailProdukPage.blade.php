<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <link rel="icon" type="image/x-icon" href="images/logoP3L.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link href="{{ asset('homeStyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <meta name="description"
        content="Detail page for hampers and products with high-quality images, descriptions, and prices.">
    <meta name="keywords" content="hampers, products, detail page, e-commerce, pricing">

    <style>
        body {
            background-color: #f2f1ec;
        }

        .product-detail {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 100px;
            margin-bottom: 50px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .product-images {
            flex: 1 1 40%;
            max-width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-images img {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .product-images img:hover {
            transform: scale(1.05);
        }

        .product-info {
            flex: 1 1 55%;
            max-width: 55%;
        }

        .product-info h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .product-info .price {
            font-size: 2em;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .product-info .quota,
        .product-info .stock,
        .product-info .isi {
            font-size: 1.3em;
            margin-bottom: 10px;
        }

        .product-info .description {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .product-detail {
                flex-direction: column;
                gap: 0;
            }

            .product-images,
            .product-info {
                max-width: 100%;
            }

            .related-products .product {
                width: 48%;
                margin-right: 2%;
            }
        }
    </style>
</head>

<body>

    <!-- header -->
    <header class="header">
        <img class="logo" src="{{ asset('images/logoP3L.png') }}" alt="Logo P3L">
        <nav class="navbar" aria-label="Primary navigation">
            <a href="/#home" class="nav-link" aria-label="Home">home</a>
            <a href="/#about" class="nav-link" aria-label="About">about</a>
            <a href="/produkHome" class="nav-link" aria-label="Products">produk</a>
            <a href="/#gallery" class="nav-link" aria-label="Gallery">foto</a>
            @if (Auth::check())
                <a href="{{ route('pesanan.create') }}" class="nav-link" aria-label="Order">order</a>
            @endif
        </nav>
        <div class="icons">
            @if (Auth::check())
                <div id="cart-btn" class="fas fa-shopping-cart" aria-label="Cart"></div>
                <div id="profile-btn" onclick="window.location.href='{{ route('user.userProfile') }}'"
                    class="fas fa-user" aria-label="Profile"></div>
            @endif
            @if (Auth::check())
                <div id="logout-btn" onclick="window.location.href='{{ route('actionLogout') }}'"
                    class="fas fa-sign-out-alt" aria-label="Logout"></div>
            @else
                <div id="login-btn" onclick="window.location.href='{{ url('login') }}'" class="fas fa-sign-in-alt"
                    aria-label="Login"></div>
            @endif
            <div id="menu-btn" class="fas fa-bars" aria-label="Menu"></div>
        </div>
    </header>
    <!-- header end -->

    <!-- product detail section -->
    <section class="product-detail">
        <div class="product-images">
            <img src="{{ isset($hampers) ? $hampers->gambar_hampers : $produk->gambar_produk }}" alt="Hampers Image">
        </div>
        <div class="product-info">
            <h1>{{ isset($hampers) ? $hampers->nama_hampers : $produk->nama_produk }}</h1>
            <div class="price">Rp. {{ isset($hampers) ? $hampers->harga_hampers : $produk->harga }},-</div>
            @if (isset($hampers))
                @foreach ($produk as $pro)
                    @if ($pro->id_hampers === $hampers->id_hampers)
                        <p class="isi" style="font-size: larger;">{{ $pro->nama_produk }}</p>
                    @endif
                @endforeach
            @else
                @if (isset($produk->resep))
                    <span class="quota" style="font-size: larger;">Kuota Harian:
                        {{ $produk->resep->kuota_harian }}</span>
                @endif
                <p class="stock" style="font-size: larger;">Stok Produk: {{ $produk->jumlah_stok }}</p>
            @endif
            <br>
            <div class="description">
                <p style="font-size: larger;">
                    {{ isset($hampers) ? $hampers->deskripsi_hampers : $produk->deskripsi_produk }}</p>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Alamat</h3>
                <p>Jl. Centralpark No. 10 Yogyakarta</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f" aria-label="Facebook"></a>
                    <a href="#" class="fab fa-twitter" aria-label="Twitter"></a>
                    <a href="#" class="fab fa-instagram" aria-label="Instagram"></a>
                    <a href="#" class="fab fa-linkedin" aria-label="LinkedIn"></a>
                </div>
            </div>
            <div class="box">
                <h3>E-mail</h3>
                <a href="mailto:taidiklasik@gmail.com" class="link">taidiklasik@gmail.com</a>
                <a href="mailto:elluygabrielp@gmail.com" class="link">elluygabrielp@gmail.com</a>
            </div>
            <div class="box">
                <h3>Call Us</h3>
                <p>+62 851 7170 3304</p>
                <p>+62 812 2833 2396</p>
                <p>+62 812 4080 5617</p>
            </div>
            <div class="box">
                <h3>Opening Hours</h3>
                <p>Senin - Jumat: 9:00 - 23:00 <br> Sabtu: 8:00 - 24:00</p>
            </div>
        </div>
        <div class="credit">Created by <span>Atma Kitchen</span> | All rights reserved!</div>
    </section>
    <!-- footer ends -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="homeScript.js"></script>
    <script>
        lightGallery(document.querySelector('.gallery .gallery-container'));
    </script>
</body>

</html>
