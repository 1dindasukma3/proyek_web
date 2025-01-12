<?php
include 'Latihan_09_config.php'; // Koneksi database

// Proses penyimpanan data buku tamu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    // Validasi input (tidak boleh kosong)
    if (empty($nama) || empty($pesan)) {
        echo "<div class='alert alert-danger'>Nama dan Pesan wajib diisi.</div>";
    } else {
        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO buku_tamu (nama, pesan) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $pesan);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Terima kasih, pesan Anda telah disimpan!</div>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan pesan: " . $conn->error . "</div>";
        }

        $stmt->close();
    }
}
?>

<div class="container">
    <h2>Buku Tamu</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <hr>
    <h3>Daftar Pesan</h3>
    <div class="bg-light p-3">
        <?php
        // Ambil data buku tamu dari database
        $result = $conn->query("SELECT * FROM buku_tamu ORDER BY tanggal DESC");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>" . htmlspecialchars($row['nama']) . "</strong> (" . $row['tanggal'] . ")<br>" . htmlspecialchars($row['pesan']) . "</p><hr>";
            }
        } else {
            echo "<p>Belum ada pesan.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>
