<!DOCTYPE html>
<html lang="en" id="invoice">

<head>
    <meta charset="utf-8" />

    <title>invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        body {
            margin-top: 20px;
            margin-bottom: 20px;
            background-color: #f2f1ec;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">
                                Invoice {{ date('Y.m') . '.' . $pesanan->id_pesanan }}
                                <span class="badge bg-success font-size-12 ms-2">{{ $pesanan->status }}</span>
                            </h4>
                            <div class="mb-4">
                                <h2 class="mb-1 text-muted">Atma Kitchen</h2>
                                <p class="mb-1">Jl. Centralpark No. 10 Yogyakarta</p>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="text-muted">
                                    <h5 class="font-size-15 mb-2">
                                        {{ $pesanan->customer->name }}
                                    </h5>
                                    <p class="mb-1">{{ $pesanan->alamat }}</p>
                                    <p class="mb-1">{{ $pesanan->customer->email }}</p>
                                    <p>{{ $pesanan->jenis_delivery }}</p>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <div>
                                            <h5 class="font-size-15 mb-1">Invoice Date</h5>
                                            <p>{{ date('d/m/Y H:i', strtotime($pesanan->tanggal_pesan)) }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Paid Off Date</h5>
                                            <p>{{ date('d/m/Y H:i', strtotime($pesanan->tanggal_lunas)) }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Retrieve Date</h5>
                                            <p>{{ date('d/m/Y H:i', strtotime($pesanan->tanggal_ambil)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px">No.</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th class="text-end" style="width: 120px">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detilPesanan as $detil)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $detil->produk->nama_produk }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>Rp. {{ number_format($detil->harga_produk, 0, ',', '.') }}</td>
                                                <td>{{ $detil->kuantitas }}</td>
                                                <td class="text-end">Rp.
                                                    {{ number_format($detil->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">
                                                Sub Total
                                            </th>
                                            @php
                                                $total = 0; // Declare and initialize the $subtotal variable
                                                foreach ($detilPesanan as $detil) {
                                                    $total += $detil->subtotal; // Calculate the subtotal
                                                }
                                            @endphp
                                            <td class="text-end">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Ongkos kirim (rad. {{ $pesanan->jarak }}) :
                                            </th>
                                            <td class="border-0 text-end"> Rp. {{ $pesanan->jarak * 2000 }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Total
                                            </th>
                                            <td class="border-0 text-end">Rp.
                                                {{ number_format($total + $pesanan->jarak * 2000, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @if ($pesanan->poin_digunakan > 0)
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Potongan {{ $pesanan->poin_digunakan }} poin :
                                                </th>
                                                <td class="border-0 text-end">- Rp.
                                                    {{ $pesanan->poin_digunakan * 100 }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Total
                                            </th>
                                            <td class="border-0 text-end">
                                                <h4 class="m-0 fw-semibold">
                                                    {{ number_format($total + $pesanan->jarak * 2000 - $pesanan->poin_digunakan * 100, 0, ',', '.') }}
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-print-none mt-4">
                                <p class="text-muted">Poin dari pesanan ini: {{ $pesanan->poin_didapat }}</p>
                                <p class="text-muted">Total poin customer: {{ $pesanan->customer->poin }}</p>
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i
                                            class="fa fa-print"></i></a>
                                    <a href="javascript:window.history.back()" class="btn btn-primary w-md">Back</a>
                                    <button id="download" class="btn btn-info w-md">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('download').addEventListener('click', function() {
            var invoice = document.getElementById('invoice');
            html2canvas(invoice, {
                onrendered: function(canvas) {
                    var a = document.createElement('a');
                    // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
                    a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                    a.download = 'invoice.jpg';
                    a.click();
                }
            });
        });
    </script>

    <script type="text/javascript"></script>
</body>

</html>
