<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Data Customer</title>
    @include('admin.template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.template.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                @include('admin.template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Customer</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Tanggal Pelunasan</th>
                                            <th>Nama Produk</th>
                                            <th>Kuantitas</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Tanggal Pelunasan</th>
                                            <th>Nama Produk</th>
                                            <th>Kuantitas</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($detil_pesanan as $item)
                                            <tr>
                                                <td>{{ $item->pesanan->customer->name ?? 'N/A' }}</td>
                                                <td>{{ $item->pesanan->tanggal_pesan }}</td>
                                                <td>{{ $item->pesanan->tanggal_lunas }}</td>
                                                <td>{{ $item->produk->nama_produk }}</td>
                                                <td>{{ $item->kuantitas }}</td>
                                                <td>{{ $item->subtotal }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki History Pesanan Customer!
                                            </div>
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
            @include('admin.template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('admin.template.logoutModal')

    @include('admin.template.script')

</body>

</html>