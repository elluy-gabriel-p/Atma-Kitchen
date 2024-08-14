<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Edit Karyawan</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Karyawan</h1>
                                </div>
                                <form class="user" action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Nama Karyawan</label>
                                            <input type="text"
                                                class="form-control form-control-user @error('nama_karyawan') is-invalid @enderror"
                                                id="inputNamaKaryawan" placeholder="Nama Karyawan"
                                                value="{{ old('nama_karyawan',$karyawan->nama_karyawan) }}" name="nama_karyawan">
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
                                                value="{{ old('honor_harian',$karyawan->honor_harian) }}" name="honor_harian">
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
                                                <option value="Pegawai" {{ old('jabatan',$karyawan->jabatan) == 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
                                                <option value="MO" {{ old('jabatan',$karyawan->jabatan) == 'MO' ? 'selected' : '' }}>MO</option>
                                                <option value="Admin" {{ old('jabatan',$karyawan->jabatan) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="Owner" {{ old('jabatan',$karyawan->jabatan) == 'Owner' ? 'selected' : '' }}>Owner</option>
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
                                                id="inputPassword" placeholder="password"
                                                value="{{ old('password',$karyawan->password) }}" name="password">
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
