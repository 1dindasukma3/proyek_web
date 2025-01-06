<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link rel="stylesheet" href="alumni.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tracer Alumni</h1>

        <!-- Form Input -->
        <form id="alumniForm" class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" id="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="col-md-6">
                    <input type="number" id="tahun_lulus" class="form-control" placeholder="Tahun Lulus" min="1900" max="2099" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
                </div>
                <div class="col-md-6">
                    <input type="text" id="kontak" class="form-control" placeholder="Kontak" required>
                </div>
            </div>
            <button type="button" id="addAlumni" class="btn btn-primary mt-4">Tambah Alumni</button>
        </form>

        <!-- Data Table -->
        <h3>Data Alumni</h3>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th> 
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Pekerjaan</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <!-- Data dari backend.php atau JSON akan muncul di sini -->
                <tr>
                    <td colspan="5" class="text-center">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
