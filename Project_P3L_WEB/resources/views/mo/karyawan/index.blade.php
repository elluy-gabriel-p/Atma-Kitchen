<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kitchen - Pengeluaran Lain</title>
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

            <div id="content">

                <!-- Topbar -->
                @include('mo.template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
                    <div class="form-group">
                            <input type="text" class="form-control" id="search" placeholder="Search by Product Name">
                        </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('karyawan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                KARYAWAN</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Honor Harian</th>
                                            <th>Bonus</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($karyawan as $item)
                                            <tr>

                                                <td>{{ $item->nama_karyawan }}</td>
                                                <td>{{ $item->jabatan }}</td>
                                                <td>{{ $item->honor_harian}}</td>
                                                <td>{{ $item->bonus }}</td>
                                                <td>{{ $item->password }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('karyawan.destroy', $item->id_karyawan) }}"
                                                        method="POST">
                                                        <a href="{{ route('karyawan.edit', $item->id_karyawan) }}"
                                                            class="btn btn-sm btn-primary">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Belum Memiliki Karyawan!
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
            @include('mo.template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('mo.template.logoutModal')

    @include('mo.template.script')

      <!-- Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Bootstrap Datepicker JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
      <!-- Initialize Bootstrap Datepicker -->
      <script>
          $(document).ready(function(){
              $('#UlangTahun').datepicker({
                  format: 'yyyy-mm-dd',
                  autoclose: true
              });
          });
  
          // Add search functionality
          $(document).ready(function(){
              $("#search").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#dataTable tbody tr").filter(function() {
                      $(this).toggle($(this).find('td:nth-child(1)').text().toLowerCase().indexOf(value) > -1)
                  });
              });
          });
      </script>

</body>

</html>
