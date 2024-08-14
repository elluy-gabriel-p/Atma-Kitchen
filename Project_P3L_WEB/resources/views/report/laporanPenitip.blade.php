<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Kitchen - Laporan Stok Bahan Baku</title>
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

        p {
            margin-bottom: 10px;
        }

        h3 {
            text-decoration: underline;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Atma Kitchen</h2>
        <p>Jl. Centralpark No. 10 Yogyakarta</p>
        <h3>LAPORAN REKAP TRANSAKSI PENITIP</h3>
        <p>Tanggal cetak: {{ $date }}</p>
        <table>
            <thead>
                <tr>
                    <th>Nama Penitip</th>
                    <th>Tanggal</th>
                    <th>Penjualan</th>
                    <th>Profit Penitip</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penitip as $item)
                    <tr>
                        <td>{{ $item->Produk->Penitip->nama_penitip }}</td>
                        <td>{{ $item->Pesanan->tanggal_lunas }}</td>
                        <td class="text-right">{{ number_format($item->pembayaran, 0, ',', '.') }}
                        <td class="text-right">{{ number_format($item->pembayaran * 0.8, 0, ',', '.') }}
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="alert alert-danger">
                            
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
