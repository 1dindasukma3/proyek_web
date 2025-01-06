<?php
$json_file = 'data_alumni/data.json';

// Fungsi untuk membaca data dari file JSON
function read_json($file) {
    if (!file_exists($file)) {
        return [];
    }
    $json_data = file_get_contents($file);
    return json_decode($json_data, true);
}

// Fungsi untuk menulis data ke file JSON
function write_json($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Tambahkan data alumni
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = read_json($json_file);

    $new_alumni = [
        "id" => count($data) + 1,
        "nama" => $_POST['nama'],
        "tahun_lulus" => (int)$_POST['tahun_lulus'],
        "pekerjaan" => $_POST['pekerjaan'],
        "kontak" => $_POST['kontak']
    ];

    $data[] = $new_alumni;
    write_json($json_file, $data);

    echo "Alumni berhasil ditambahkan!";
    exit;
}

// Ambil data alumni
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = read_json($json_file);
    echo json_encode($data);
    exit;
}
?>
