<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Create Hampers</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Add Hampers</h1>
                                </div>
                                <form class="user" action="{{ route('hampers.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Hampers</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('nama_hampers') is-invalid @enderror"
                                            id="InputNamaHampers" placeholder="Nama Hampers"
                                            value="{{ old('nama_hampers') }}" name="nama_hampers" required>
                                        @error('nama_hampers')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Harga</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('harga_hampers') is-invalid @enderror"
                                                id="InputHarga" placeholder="Harga Hampers"
                                                value="{{ old('harga_hampers') }}" name="harga_hampers" required>
                                            @error('harga_hampers')
                                                <div class="invalid-feedback" re>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Tanggal Mulai Promo</label>
                                            <input type="date"
                                                class="form-control form-control-user @error('tgl_mulai_promo') is-invalid @enderror"
                                                id="InputJumlahStok" placeholder="Tanggal Mulai Promo"
                                                value="{{ old('tgl_mulai_promo') }}" name="tgl_mulai_promo" required>
                                            @error('tgl_mulai_promo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Tanggal Akhir Promo</label>
                                            <input type="date"
                                                class="form-control form-control-user @error('tgl_akhir_promo') is-invalid @enderror"
                                                id="InputTipeHampers" placeholder="Tanggal Akhir Promo"
                                                value="{{ old('tgl_akhir_promo') }}" name="tgl_akhir_promo" required>
                                            @error('tgl_akhir_promo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
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
