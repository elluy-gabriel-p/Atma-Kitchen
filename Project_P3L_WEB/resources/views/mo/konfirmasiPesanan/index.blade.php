<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Konfirmasi Pesanan</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Konfirmasi Status Pesanan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
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
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Nomor Nota</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Status</th>
                                        <th>Jenis Delivery</th>
                                        <th>Nama Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan as $item)
                                        <tr>
                                        <td>{{ $item->no_nota }}</td>
                                            <td>{{ $item->tanggal_ambil }}</td>
                                            <td>{{ $item->tanggal_pesan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->jenis_delivery }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>
                                            <a href="{{ route('terimaPesanan.updateStatus', $item->id_pesanan) }}"
                                                    class="btn btn-sm btn-success">Terima</a>
                                            <a href="{{ route('terimaPesanan.updateStatusN', $item->id_pesanan) }}"
                                                    class="btn btn-sm btn-danger">Tolak</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No orders yet!</td>
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
