<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Pembelian Bahan Baku</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Konfirmasi Penarikan Saldo</h1>

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
                                        <th>Nama Customer</th>
                                        <th>Saldo Ditarik</th>
                                        <th>Nomor Rekening</th>
                                        <th>Status Penarikan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($saldo as $item)
                                        <tr>
                                            <td>{{ $item->customer->name }}</td>
                                            <td>{{ $item->saldoKembali }}</td>
                                            <td>{{ $item->nomorRekening }}</td>
                                            <td>{{ $item->statusPenarikan }}</td>
                                            <td>
                                            <a href="{{ route('saldo.updateStatus', $item->id_saldo) }}"
                                                    class="btn btn-sm btn-success">Terima</a>
                                            <a href="{{ route('saldo.updateStatusN', $item->id_saldo) }}"
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
