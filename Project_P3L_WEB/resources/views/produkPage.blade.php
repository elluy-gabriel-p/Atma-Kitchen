<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    @include('templateUser.head')
    <style>
        .product {
            padding: 20px;
        }

        .box:hover {
            transform: translateY(-10px);
        }

        .box img {
            width: 100%;
            object-fit: cover;
        }

        .box .content {
            padding: 15px;
            text-align: center;
        }

        .box .content h3 {
            margin: 10px 0;
        }

        .box .content .price {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- header -->
    @include('templateUser.navbar')
    <!-- header end -->

    <!-- shopping cart -->
    @include('templateUser.shoppingCart')
    <!-- shopping cart end-->

    <!-- product -->
    <section class="product" id="product">
        <div style="margin-top: 90px;"></div>
        <h1 class="heading">our <span>products</span></h1>
        <div class="box-container">
            @foreach ($produk as $item)
                @if ($item->tipe_produk === 'Asli')
                    <div class="box">
                        <a href="{{ route('produkHome.show', $item->id_produk) }}" class="text-decoration-none">
                            @include('partials.productBox', ['item' => $item])
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div style="margin-top: 90px;"></div>
        <h1 class="heading">our <span>hampers</span></h1>
        <div class="box-container">
            @foreach ($hampers as $item)
                <div class="box">
                    <a href="{{ route('produkHome.edit', $item->id_hampers) }}" class="text-decoration-none">
                        <div class="image">
                            <img src="{{ $item->gambar_hampers }}" alt="Hampers" />
                        </div>
                        <div class="content">
                            <h3>{{ $item->nama_hampers }}</h3>
                            @foreach ($produk as $pro)
                                @if ($pro->id_hampers === $item->id_hampers)
                                    <span class="stars" style="font-size: larger;">{{ $pro->nama_produk }}, </span>
                                @endif
                            @endforeach
                            <br>
                            <span class="price">Rp. {{ number_format($item->harga_hampers, 0, ',', '.') }},-</span>
                            <br>
                            @if (Auth::check())
                                <a href="{{ route('addproduk.to.cart', $item->id_hampers) }}" class="btn">add to
                                    cart</a>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div style="margin-top: 90px;"></div>
        <h1 class="heading">lain <span>- lain</span></h1>
        <div class="box-container">
            @foreach ($produk as $item)
                @if ($item->tipe_produk === 'Titipan')
                    <div class="box">
                        <a href="{{ route('produkHome.show', $item->id_produk) }}" class="text-decoration-none">
                            @include('partials.productBox', ['item' => $item])
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <!-- product end -->

    <!-- footer -->
    @include('templateUser.footer')
    <!-- footer ends -->

    @include('templateUser.script')
</body>

</html>
