<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Kitchen - Laporan Penjualan Bulanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2,
        h3,
        p {
            margin: 0;
        }

        h3 {
            margin-top: 50px;
            text-decoration: underline;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Atma Kitchen</h2>
        <p>Jl. Centralpark No. 10 Yogyakarta</p>
        <h3>LAPORAN PENJUALAN BULANAN</h3>
        <p>Bulan : {{ $bulan }}</p>
        <p>Tahun : {{ $tahun }}</p>
        <p style="margin-bottom: 10px;">Tanggal cetak: {{ $date }}</p>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga</th>
                    <th>Jumlah Uang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_pesanan as $item)
                    <tr>
                        <td>{{ $item->produk->nama_produk }}</td>
                        <td>{{ $item->kuantitas }}</td>
                        <td class="text-right">{{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($item->kuantitas * $item->harga_produk, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td class="text-right">{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
