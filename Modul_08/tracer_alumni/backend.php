<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tracer_alumni';

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Tambahkan data alumni
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $pekerjaan = $_POST['pekerjaan'];
    $kontak = $_POST['kontak'];

    $stmt = $conn->prepare("INSERT INTO alumni (nama, tahun_lulus, pekerjaan, kontak) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nama, $tahun_lulus, $pekerjaan, $kontak);
    $stmt->execute();
    echo "Alumni berhasil ditambahkan!";
    $stmt->close();
    $conn->close();
    exit;
}

// Ambil data alumni
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM alumni");
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
    $conn->close();
    exit;
}
?>
