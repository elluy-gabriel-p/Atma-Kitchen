<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Add Resep</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Input Jarak Pesanan</h1>
                                </div>
                                <form class="user" action="{{ route('pesanan.updateJarakPesanan', $pesanan->id_pesanan) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor nota</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('tanggal_pesan') is-invalid @enderror"
                                            
                                            value="{{ old('tanggal_pesan', $pesanan->tanggal_pesan) }}" disabled>
                                        @error('tanggal_pesan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor nota</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('tanggal_pesan') is-invalid @enderror"
                                            
                                            value="{{ old('tanggal_pesan', $pesanan->tanggal_pesan) }}" disabled>
                                        @error('tanggal_pesan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Pesan</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('tanggal_pesan') is-invalid @enderror"
                                            
                                            value="{{ old('tanggal_pesan', $pesanan->tanggal_pesan) }}" disabled>
                                        @error('tanggal_pesan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor Ambil</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('tanggal_ambil') is-invalid @enderror"
                                            
                                            value="{{ old('tanggal_ambil', $pesanan->tanggal_ambil) }}" disabled>
                                        @error('tanggal_ambil')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Status</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('status') is-invalid @enderror"
                                            
                                            value="{{ old('status', $pesanan->status) }}" disabled>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Delivery</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('jenis_delivery') is-invalid @enderror"
                                            
                                            value="{{ old('jenis_delivery', $pesanan->jenis_delivery) }}" disabled>
                                        @error('jenis_delivery')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Jarak</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('jarak') is-invalid @enderror"
                                            type="number" placeholder="Jarak Pesanan"
                                            value="{{ old('jarak', $pesanan->jarak) }}" name="jarak">
                                        @error('jarak')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </button>

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
