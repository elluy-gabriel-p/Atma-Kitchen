<html>

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
<a href='{{ route('user.userProfile') }}' class="back-button btn btn-primary">Back</a>

<div class="container mt-5" style="max-width: 500px; margin: auto;">
    <h2 class="mb-4 text-center" style="color: #007bff;">Upload Bukti Pembayaran</h2>
    @if(isset($pesanan))
        <form action="{{ route('user.uploadBukti', $pesanan->id_pesanan) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm" style="background-color: #f8f9fa;">
            @csrf
            <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label" style="font-weight: bold; color: #007bff;">Pilih File Bukti Pembayaran:</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-size: 16px; border-radius: 20px;">Upload</button>
            </div>
        </form>
    @else
        <div class="alert alert-warning" role="alert" style="font-size: 16px;">
            Pesanan tidak ditemukan.
        </div>
    @endif
</div>
 <!-- Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Datepicker JS -->

</html>
