<?php
require_once 'koneksi.php';

// 1. Tangkap data dari form
$_kode = $_POST['kode'] ?? NULL;
$_nama = $_POST['nama'] ?? NULL;
$kaprodi = $_POST['kaprodi'] ?? NULL;
$_proses = $_POST['proses'] ?? NULL;

if($_proses == "Simpan"){
    $sql = "INSERT INTO prodi(kode,nama,kaprodi) VALUES (?,?,?)";
    $ar_data = [$_kode, $_nama, $kaprodi];

}elseif($_proses == "Update"){
    $id_edit = $_POST['id_edit'] ?? NULL; //4
    $ar_data = [$_kode, $_nama, $kaprodi, $id_edit];
    $sql = "UPDATE prodi SET kode = ?, nama = ?, kaprodi = ? WHERE id = ?";

}elseif($_proses == "Hapus"){
    $id_hapus = $_POST['id_hapus'] ?? NULL;
    $ar_data = [$id_hapus];
    $sql = "DELETE FROM prodi WHERE id = ?";

}else{
    die("Proses tidak dikenali. Pastikan tombol yang ditekan adalah simpan, Update, atau Hapus");
}

// 5. Buat Statemant
$stmt = $dbh->prepare($sql);
// 6. Jalankan Query
$stmt->execute($ar_data);
// Redirect ke halaman list_prodi.php
header('location: list_prodi.php');
?>