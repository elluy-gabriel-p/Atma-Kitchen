<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Pengeluaran Lain</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Pengeluaran Lain</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('pengeluaran_lain.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                Pengeluaran Lain</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Total Pengeluaran</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Tanggal Pengeluaran</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Total Pengeluaran</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Tanggal Pengeluaran</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($pengeluaran_lain as $item)
                                            <tr>

                                                <td>{{ $item->total_pengeluaran }}</td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->tanggal_pengeluaran }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('pengeluaran_lain.destroy', $item->id_pengeluaran) }}"
                                                        method="POST">
                                                        <a href="{{ route('pengeluaran_lain.edit', $item->id_pengeluaran) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki Pengeluaran Lain!
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
