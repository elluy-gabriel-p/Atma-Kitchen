<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Atma Kitchen</h1>
    <p>Jl. Centralpark No. 10 Yogyakarta</p>
    
    <h2>LAPORAN PRESENSI BULANAN</h2>
    <p>Bulan: {{ $bulan }}</p>
    <p>Tahun: {{ $tahun }}</p>
    <p>Tanggal cetak: {{ $date }}</p>
    
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Honor Harian</th>
                <th>Bonus</th>
                <th>Jumlah Hadir</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawanData as $item)
            <tr>
                <td>{{ $item['nama_karyawan'] }}</td>
                <td>{{ $item['honor_harian'] }}</td>
                <td>{{ $item['bonus'] }}</td>
                <td>{{ $itung }}</td>
                <td class="text-right">{{ number_format($item['honor_harian'] * $itung + $item['bonus'], 0, ',', '.') }}
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td class="text-right">{{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
