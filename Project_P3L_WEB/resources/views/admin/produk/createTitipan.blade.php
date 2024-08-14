<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Edit Produk</title>
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

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.template.navbar')
                <!-- End of Topbar -->

                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Produk Titipan</h1>
                                </div>
                                <form class="user" action="{{ route('produk.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Produk</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('nama_produk') is-invalid @enderror"
                                            id="InputNamaProduk" placeholder="Nama Produk"
                                            value="{{ old('nama_produk') }}" name="nama_produk" required>
                                        @error('nama_produk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Harga</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('harga') is-invalid @enderror"
                                                id="InputHarga" placeholder="Harga Produk" value="{{ old('harga') }}"
                                                name="harga" required>
                                            @error('harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="font-weight-bold">Jumlah Stok</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('jumlah_stok') is-invalid @enderror"
                                                id="InputJumlahStok" placeholder="Jumlah Stok"
                                                value="{{ old('jumlah_stok') }}" name="jumlah_stok" min="1"
                                                required>
                                            @error('jumlah_stok')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Gambar Produk</label>
                                        <input type="file"
                                            class="form-control @error('gambar_produk') is-invalid @enderror"
                                            id="InputGambar" placeholder="Gambar" value="{{ old('gambar_produk') }}"
                                            name="gambar_produk">
                                        @error('gambar_produk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Penitip</label>
                                        <select class="form-control  @error('nama_penitip') is-invalid @enderror"
                                            name="id_penitip" required>
                                            <option selected disabled value="">Pilih Penitip</option>
                                            @foreach ($penitip as $item)
                                                <option value="{{ $item->id_penitip }}">{{ $item->nama_penitip }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nama_penitip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="tipe_produk" value="Titipan">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </button>
                                    <hr>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


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
