<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Yang Perlu Dibayar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="homeStyle.css">
    <style>
        body {
            padding-top: 50px;
            background-color: #f8f9fa;
            /* Set background color */
            color: #212529;
            /* Set text color */
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            /* Rounded corners for the table container */
            padding: 20px;
            /* Add padding */
        }

        th,
        td {
            vertical-align: middle;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .thead-dark th {
            background-color: #343a40;
            /* Dark background color for table header */
            color: #fff;
            /* Text color for table header */
        }

        .btn-primary {
            background-color: #007bff;
            /* Primary button color */
            border-color: #007bff;
            /* Border color for primary button */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Button color on hover */
            border-color: #0056b3;
            /* Border color on hover */
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <a href='{{ route('user.userProfile') }}' class="back-button btn btn-primary">Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Pesanan Yang Perlu Dibayar</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search"
                                placeholder="Search by Product Name">
                        </div>
                        <div class="table-container">
                            <table class="table table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nomor Nota</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Status</th>
                                        <th>Jenis Delivery</th>
                                        <th>Nama Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan as $item)
                                        <tr>
                                            <td>{{ $item->no_nota }}</td>
                                            <td>{{ $item->tanggal_ambil }}</td>
                                            <td>{{ $item->tanggal_pesan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->jenis_delivery }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>
                                                <a href="{{ route('user.uploadPage', $item->id_pesanan) }}"
                                                    class="btn btn-sm btn-success">Bayar Nota</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No orders yet!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Initialize Bootstrap Datepicker -->
    <script>
        $(document).ready(function() {
            $('#UlangTahun').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });

        // Add search functionality
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).find('td:nth-child(6)').text().toLowerCase().indexOf(
                        value) > -1)
                });
            });
        });
    </script>
</body>

</html>
