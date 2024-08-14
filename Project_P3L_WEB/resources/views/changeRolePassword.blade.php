<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 50px;
            background-image: url('your-background-image.jpg');
            /* Add your background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            /* Set text color to white for better visibility */
        }

        .card {
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            /* Semi-transparent background for the card */
            color: #fff;
            /* Text color for the card */
            border: none;
            /* Remove card border */
        }

        .card-header {
            background-color: rgba(0, 123, 255, 0.7);
            /* Semi-transparent blue background for card header */
            color: #fff;
            /* Text color for card header */
            text-align: center;
            border-bottom: none;
            /* Remove border bottom for card header */
        }

        .form-group {
            margin-bottom: 20px;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @php
                                $currentUrl = $role;
                            @endphp
                        @endif
                        <h3>Change Password</h3>
                    </div>
                    <form class="card-body user" action="{{ route('karyawan.changepassword', $currentUrl) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Karyawan</label>
                            <input type="text" class="form-control" id="InputNamaKaryawan"
                                placeholder="Nama Karyawan" value="{{ old('nama_karyawan') }}" name="nama_karyawan">
                            @error('nama_karyawan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="text" class="form-control" id="InputPassword" placeholder="Password"
                                value="{{ old('password') }}" name="password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
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
    </script>
</body>

</html>
