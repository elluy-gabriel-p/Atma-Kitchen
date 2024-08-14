<!-- resources/views/partials/productBox.blade.php -->
<div class="image">
    <img src="{{ $item->gambar_produk }}" alt="Image of {{ $item->nama_produk }}" />
</div>
<div class="content">
    <h3>{{ $item->nama_produk }}</h3>
    @if (isset($item->resep))
        <span class="quota" style="font-size: larger;">Kuota Harian: {{ $item->resep->kuota_harian }}</span>
    @endif
    <span class="stock" style="font-size: larger;">Stok Produk: {{ $item->jumlah_stok }}</span>
    <br>
    <span class="price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>
    <br>
    @if (Auth::check())
        <a href="{{ route('addproduk.to.cart', $item->id_produk) }}" class="btn">add to cart</a>
    @endif
</div>
