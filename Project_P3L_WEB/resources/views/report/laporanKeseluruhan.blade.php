<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
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

        .chart-container {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Atma Kitchen</h2>
        <p>Jl. Centralpark No. 10 Yogyakarta</p>
        <h3>{{ $title }}</h3>
        <p>Tahun: {{ $tahun }}</p>
        <p>Tanggal cetak: {{ $date }}</p>

        <div class="chart-container">
            <img src="{{ public_path('chart.png') }}" alt="Chart">
        </div>

        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Transaksi</th>
                    <th>Jumlah Uang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $month)
                    <tr>
                        <td>{{ \Carbon\Carbon::create()->month($month['bulan'])->translatedFormat('F') }}</td>
                        <td>{{ $month['total'] }}</td>
                        <td>{{ number_format($month['total_uang'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Total</th>
                    <th>{{ $total_transaksi }}</th>
                    <th>{{ number_format($total_uang, 0, ',', '.') }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
