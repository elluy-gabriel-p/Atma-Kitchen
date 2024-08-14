<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Add Pembelian Bahan Baku</title>
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
                                    <h1 class="h4 text-gray-900 mb-4">Add Pembelian Bahan Baku</h1>
                                </div>

                                <form class="user" action="{{ route('beliBahan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label class="font-weight-bold">Harga Bahan Baku</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('harga_bahan_baku') is-invalid @enderror"
                                                id="InputHargaBahan" placeholder="Harga Bahan Baku"
                                                value="{{ old('harga_bahan_baku') }}" name="harga_bahan_baku">
                                            @error('harga_bahan_baku')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Kuantitas</label>
                                            <input type="number"
                                                class="form-control form-control-user @error('kuantitas') is-invalid @enderror"
                                                id="InputKuantitas" placeholder="Kuantitas"
                                                value="{{ old('kuantitas') }}" name="kuantitas">
                                            @error('kuantitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bold">Tanggal Pengeluaran</label>
                                            <input type="date"
                                                class="form-control form-control-user @error('tanggal_pengeluaran') is-invalid @enderror"
                                                id="InputTanggalPengeluaran" placeholder="{{ date('Y-m-d') }}"
                                                value="{{ old('tanggal_pengeluaran', date('Y-m-d')) }}"
                                                name="tanggal_pengeluaran">
                                            @error('tanggal_pengeluaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Bahan Baku</label>
                                        <select class="form-control  @error('nama_bahan') is-invalid @enderror"
                                            name="id_bahan_baku">
                                            <option selected disabled value="">Pilih Bahan Baku</option>
                                            @foreach ($bahan_baku as $item)
                                                <option value="{{ $item->id_bahan_baku }}">{{ $item->nama_bahan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nama_bahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
