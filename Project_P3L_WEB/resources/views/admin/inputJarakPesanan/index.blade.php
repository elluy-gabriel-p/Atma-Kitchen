<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Resep</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Resep</h1>

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
                                            <th>Status</th>
                                            <th>Jenis Delivery</th>
                                            <th>Jarak</th>
                                        

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
                                                <td>{{ $item->jarak }}</td>

                                                <td>
                                                        <a href="{{ route('pesanan.inputJarakPesanan', $item->id_pesanan) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                </td>  
                                                      
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki Pesanan
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


