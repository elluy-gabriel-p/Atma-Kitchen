<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Create Karyawan</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Add Karyawan</h1>
                                </div>
                                <form class="user" action="{{ route('karyawan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Nama Karyawan</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('nama_karyawan') is-invalid @enderror"
                                                id="inputNamaKaryawan" placeholder="Nama Karyawan"
                                                value="{{ old('nama_karyawan') }}" name="nama_karyawan">
                                            @error('nama_karyawan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Honor Harian</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('honor_harian') is-invalid @enderror"
                                                id="inputHonorHarian" placeholder="Honor Harian"
                                                value="{{ old('honor_harian') }}" name="honor_harian">
                                            @error('honor_harian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Jabatan</label>
                                            <select class="form-control form-control-user @error('jabatan') is-invalid @enderror"
                                                    id="inputJabatan" name="jabatan">
                                                <option value="">Select Jabatan</option>
                                                <option value="Pegawai" {{ old('jabatan') }}>Pegawai</option>
                                                <option value="MO" {{ old('jabatan')  }}>MO</option>
                                                <option value="Admin" {{ old('jabatan')  }}>Owner</option>
                                            </select>
                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Password</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="inputPassword" placeholder="Password"
                                                value="{{ old('password') }}" name="password">
                                            @error('password')
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
