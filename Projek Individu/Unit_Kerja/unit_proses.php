<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Query Tangkap data
$kode = $_POST['kode_unit'] ?? '';
$nama = $_POST['nama_unit'] ?? '';
$status = $_POST['keterangan'] ?? '';
$_proses = $_POST['proses'] ?? '';

if ($_proses == "Simpan") {
    $sql = "INSERT INTO unit_kerja (kode_unit, nama_unit, keterangan) VALUES (?, ?, ?)";
    $ar_data = [$kode, $nama, $status];
} elseif ($_proses == "Update") {
    $id_edit = $_POST['id_edit'] ?? NULL;
    $sql = "UPDATE unit_kerja SET kode_unit=?, nama_unit=?, keterangan=? WHERE id=?";
    $ar_data = [$kode, $nama, $status];
} elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM unit_kerja WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
} else {
    die("Proses tidak diketahui");
}

// Jalankan query
$stmt = $dbh->prepare($sql);
$stmt->execute($ar_data);

// Redirect ke index
header("Location: index.php");