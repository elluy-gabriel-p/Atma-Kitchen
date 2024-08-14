<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Data Bahan Baku</title>
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
                    <h1 class="h3 mb-2 text-gray-800">List Bahan Baku Kurang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Bahan Baku</th>
                                            <th>Satuan</th>
                                            <th>Stok Bahan Baku</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @forelse ($bahan_baku as $item)
                                            <tr>
                                                <td>{{ $item->nama_bahan }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ $item->stok_bahan }}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-success">
                                                Tak ada bahan baku yang kekurangan
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
