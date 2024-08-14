<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Hampers</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Hampers</h1>

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

                            <a href="{{ route('hampers.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                HAMPERS</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Hampers</th>
                                            <th>Harga Hampers</th>
                                            <th>Mulai Promo</th>
                                            <th>Akhir Promo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($hampers as $item)
                                            <tr>

                                                <td>{{ $item->nama_hampers }}</td>
                                                <td>Rp. {{ $item->harga_hampers }}</td>
                                                <td>{{ $item->tgl_mulai_promo ? \Carbon\Carbon::parse($item->tgl_mulai_promo)->format('d-m-Y') : '' }}
                                                </td>
                                                <td>{{ $item->tgl_akhir_promo ? \Carbon\Carbon::parse($item->tgl_akhir_promo)->format('d-m-Y') : '' }}
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('hampers.destroy', $item->id_hampers) }}"
                                                        method="POST">
                                                        <a href="{{ route('hampers.edit', $item->id_hampers) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki Hampers
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
