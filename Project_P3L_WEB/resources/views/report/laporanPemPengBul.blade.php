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
        <h3>LAPORAN PEMASUKAN DAN PENGELUARAN</h3>
        <p>Bulan: {{ $bulan }}</p>
        <p>Tahun: {{ $tahun }}</p>
        <p>Tanggal cetak: {{ $date }}</p>
        <table>
            
                <tr>
                    <th>Nama Pemasukan Nota </th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
            
            <tbody>
                @forelse ($pesanan as $item)
                    <tr>
                        <td>{{ $item->pesanan->no_nota }}</td>
                        <td>{{ $item->pesanan->tanggal_lunas }}</td>
                        <td class="text-right">Rp.{{ number_format($item->subtotal, 0, ',', '.') }}
                    </tr>
                @empty
                    
                @endforelse
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pemasukkan sendiri</strong></td>
                    <td class="text-right">Rp.{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
            
            
                <tr>
                    <th>Nama Pemasukan Nota Penitip </th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
                
                
            

                @forelse ($pesanan1 as $item)
                    <tr>
                        <td>{{ $item->pesanan->no_nota }}</td>
                        <td>{{ $item->pesanan->tanggal_lunas }}</td>
                        <td class="text-right">Rp.{{ number_format($item->subtotal*0.2 + $item->ongkir, 0, ',', '.') }}
                    </tr>
                @empty
                    
                @endforelse
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pemasukkan Penitip</strong></td>
                    <td class="text-right">Rp.{{ number_format($total3, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pemasukkan</strong></td>
                    <td class="text-right">Rp.{{ number_format($total + $total3, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                
                <tr>
                    <th>Nama Pengeluaran Lain</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
                @forelse ($pengeluaranLain as $item)
                    <tr>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->tanggal_pengeluaran }}</td>
                        <td class="text-right">Rp.{{ number_format($item->total_pengeluaran, 0, ',', '.') }}</td>
                    </tr>
                @empty
                   
                @endforelse
                    <tr>
                        <td>Gaji Karyawan</td>
                        <td>2024-03-25 00:00:00 </td>
                        <td class="text-right">Rp.{{ number_format($total5, 0, ',', '.') }}</td>
                    </tr>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pengeluaran Lain</strong></td>
                    <td class="text-right">Rp.{{ number_format($total1 + $total5, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th>Nama Pembelanjaan</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
                @forelse ($belanja_bahan as $item)
                    <tr>
                        <td>{{ $item->bahan_baku->nama_bahan }}</td>
                        <td>{{ $item->tanggal_pengeluaran }}</td>
                        <td class="text-right">Rp.{{ number_format($item->harga_bahan_baku * $item->kuantitas, 0, ',', '.') }}</td>
                    </tr>
                @empty
                   
                @endforelse
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pembelanjaan</strong></td>
                    <td class="text-right">Rp.{{ number_format($total2, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total Pengeluaran</strong></td>
                    <td class="text-right">Rp.{{ number_format($total2 + $total + $total5, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                    <td class="text-right">Rp.{{ number_format($total4, 0, ',', '.') }}</td>
                </tr>
        </table>
    </div>
</body>

</html>
