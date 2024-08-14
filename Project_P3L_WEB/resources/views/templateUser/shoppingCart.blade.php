<div class="cart-items-container">
    @php $total = 0 @endphp
    <div id="close-form" class="fas fa-times"></div>
    @if (session('cart'))
        <h3 class="title">Checkout</h3>

        @foreach (session('cart') as $id => $details)
            @php $total += $details['harga'] * $details['quantity'] @endphp
            <div class="cart-item" data-id="{{ $id }}">
                <a class="delete-product"><i class="fas fa-times"></i></a>
                <img src="{{ $details['gambar_produk'] }}" alt="Product">
                <div class="content">
                    <h3>{{ $details['nama_produk'] }}</h3>
                    <div class="harga fs-4 fw-bold mb-2">Rp.{{ number_format($details['harga'], 0, ',', '.') }}/-</div>
                    <div class="quantity fs-5 mb-2">Kuantitas: {{ $details['quantity'] }}</div>
                </div>
            </div>
        @endforeach

        <div class="total fs-3 fw-bold mt-3">Rp.{{ number_format($total, 0, ',', '.') }}/-</div>
        <a href="{{ route('pesanan.create') }}" class="btn btn-success btn-lg mt-3">Checkout</a>
    @else
        <h3 class="title">Your cart is empty</h3>
    @endif
</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".edit-cart-info").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ route('update.sopping.cart') }}',
                    method: "PATCH",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.closest(".cart-item").data("id"),
                        quantity: ele.closest(".cart-item").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $(".delete-product").click(function(e) {
                e.preventDefault();
                var ele = $(this);

                if (confirm("Do you really want to delete?")) {
                    $.ajax({
                        url: '{{ route('delete.cart.product') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.closest(".cart-item").data("id")
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
