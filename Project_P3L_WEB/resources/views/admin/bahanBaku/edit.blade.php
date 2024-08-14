<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Edit Bahan Baku</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Bahan Baku</h1>
                                </div>

                                <form class="user" action="{{ route('bahan_baku.update', $bahan_baku->id_bahan_baku) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Bahan Baku</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('nama_bahan') is-invalid @enderror"
                                            id="InputNamaBahan" placeholder="Nama Bahan Baku"
                                            value="{{ old('nama_bahan', $bahan_baku->nama_bahan) }}"
                                            name="nama_bahan">
                                        @error('nama_bahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Satuan</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('satuan') is-invalid @enderror"
                                                id="InputSatuan" placeholder="Satuan"
                                                value="{{ old('satuan', $bahan_baku->satuan) }}"
                                                name="satuan">
                                            @error('satuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Stok Bahan Baku</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('stok_bahan') is-invalid @enderror"
                                                id="InputStokBahanBaku" placeholder="Stok Bahan Baku"
                                                value="{{ old('stok_bahan', $bahan_baku->stok_bahan) }}"
                                                name="stok_bahan">
                                            @error('stok_bahan')
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
