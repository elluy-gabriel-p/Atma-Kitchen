<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Pesanan untuk Diproses Hari Ini</title>
    @include('mo.template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('mo.template.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                @include('mo.template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pesanan untuk Diproses Hari Ini</h1>

                    <!-- Display session status -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Nota</th>
                                            <th>Tanggal Ambil</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Produk</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pesanan as $item)
                                            <tr>
                                                <td>{{ $item->no_nota }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_ambil)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($details->where('id_pesanan', $item->id_pesanan) as $detail)
                                                            <li>{{ $detail->produk->nama_produk }}
                                                                ({{ $detail->kuantitas }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                                        action="{{ route('process.order', ['orderId' => $item->id_pesanan]) }}"
                                                        method="POST">
                                                        <a href="{{ route('konfirmasiProses.show', $item->id_pesanan) }}"
                                                            class="btn btn-sm btn-info">Detail</a>
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary">Proses</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center alert alert-danger">
                                                    Tidak ada pesanan untuk diproses hari ini
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('mo.template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('mo.template.logoutModal')

    @include('mo.template.script')

</body>

</html>
