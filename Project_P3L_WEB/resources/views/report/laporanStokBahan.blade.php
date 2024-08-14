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
        <h3>LAPORAN Stok Bahan Baku</h3>
        <p>Tanggal cetak: {{ $date }}</p>
        <table>
            <thead>
                <tr>
                    <th>Nama Bahan</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bahan as $item)
                    <tr>
                        <td>{{ $item->nama_bahan }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>
                            @if ($item->stok_bahan < 1000)
                                <span style="color: red;">{{ number_format($item->stok_bahan, 0, ',', '.') }}</span>
                            @else
                                {{ number_format($item->stok_bahan, 0, ',', '.') }}
                            @endif
                        </td>
                    </tr>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="alert alert-danger">
                            Belum Memiliki Stok Bahan Baku
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
