<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Edit Pengeluaran Lain</title>
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

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('mo.template.navbar')
                <!-- End of Topbar -->


                <div class="container">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Pengeluaran Lain</h1>
                                </div>

                                <form class="user" action="{{ route('pengeluaran_lain.update', $pengeluaran_lain->id_pengeluaran) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="font-weight-bold">Total Pengeluaran</label>
                                        <input type="number"
                                            class="form-control form-control-user @error('total_pengeluaran') is-invalid @enderror"
                                            id="Input Total Pengeluaran" placeholder="Total Pengeluaran"
                                            value="{{ old('total_pengeluaran', $pengeluaran_lain->total_pengeluaran) }}"
                                            name="total_pengeluaran">
                                        @error('total_pengeluaran')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Jenis</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('jenis') is-invalid @enderror"
                                                id="InputHarga" placeholder="Jenis Pengeluaran"
                                                value="{{ old('jenis', $pengeluaran_lain->jenis) }}"
                                                name="jenis">
                                            @error('jenis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Tanggal Pengeluaran</label>
                                            <input type="date"
                                                class="form-control form-control-user @error('tanggal_pengeluaran') is-invalid @enderror"
                                                id="InputMulaiPromo" placeholder="Tanggal Pengeluaran"
                                                value="{{ old('tanggal_pengeluaran', $pengeluaran_lain->tanggal_pengeluaran) }}"
                                                name="tanggal_pengeluaran">
                                            @error('tanggal_pengeluaran')
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
