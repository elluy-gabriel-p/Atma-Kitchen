<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Produk</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>

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

                            <a href="{{ route('produk.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                PRODUK
                                SENDIRI</a>
                            <a href="{{ route('produk.createTitipan') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                PRODUK TITIPAN</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Hampers / Penitip</th>
                                            <th>Gambar</th>
                                            <th>Harga</th>
                                            <th>Jumlah Stok</th>
                                            <th>Tipe Produk</th>
                                            <th>Kuota PO</th>
                                            <th>Porsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produk as $item)
                                            <tr>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->tipe_produk == 'Titipan' && $item->penitip ? $item->penitip->nama_penitip : '' }}

                                                    {{ $item->tipe_produk == 'Asli' && $item->hampers ? $item->hampers->nama_hampers : '' }}
                                                </td>
                                                <td><img src="{{ $item->gambar_produk }}" width="150px"></td>
                                                <td>Rp. {{ $item->harga }}</td>
                                                <td>{{ $item->jumlah_stok }}</td>
                                                <td>{{ $item->tipe_produk }}</td>
                                                <td>{{ $item->resep ? $item->resep->kuota_harian : '' }}</td>
                                                <td>{{ $item->porsi }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('produk.destroy', $item->id_produk) }}"
                                                        method="POST">
                                                        <a href="{{ route('produk.edit', $item->id_produk) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki Produk
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
