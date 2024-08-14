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

    <link rel="stylesheet" href="homeStyle.css">
</head>
<!-- Custom CSS -->


<style>
    body {
        padding-top: 50px;
        background: #f2f1ec;
    }

    .card {
        margin-top: 20px;
    }

    .card-header {
        background-color: #783b31;
        color: #fff;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #c98d83;
        border-color: #c98d83;
    }
</style>

<body>
<a href='/' class="back-button btn btn-primary">Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <form class="card-body user" action="{{ route('user.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Name" placeholder="Username"
                                    value="{{ old('name', $user->name) }}" name="name">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Ulang Tahun :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="UlangTahun" placeholder="Ulang Tahun"
                                    value="{{ old('ulang_tahun', $user->ulang_tahun) }}" name="ulang_tahun">
                                @error('ulang_tahun')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Poin:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Poin" placeholder="Poin"
                                    value="{{ old('poin', $user->poin) }}" name="poin" disabled>
                                @error('poin')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Saldo:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Saldo" placeholder="Saldo"
                                    value="{{ old('saldo', $user->saldo) }}" name="saldo" disabled>
                                @error('saldo')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer">
                        <a href="{{ route('user.daftarpesanancust', $user->id) }}"
                            class="btn btn-sm btn-primary btn-block">Daftar Pesanan</a>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('user.historypesanan', $user->id) }}"
                            class="btn btn-sm btn-primary btn-block">History Pemesanan</a>
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
    </script>
</body>

</html>
