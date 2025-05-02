<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM unit_kerja WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto px-4 py-6 max-w-2x1">
    <h2 class="text-2x1 font-bold mb-4"><?= $id ? 'Edit' : 'Tambah' ?>Form Unit Kerja</h2>

    <!-- Navigasi Kembali -->
     <a href="index.php" class="inline-block mb-4 text-blue-600 hover:underline"><- Kembali ke Daftar Unit Kerja</a>

    <!-- Formulir -->
    <form method="POST" action="unit_proses.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

        <div class="mb-4">
            <label class="block text-gray-700">Kode Unit: </label>
            <input type="text" name="kode_unit" value="<?= $data['kode_unit'] ?? '' ?>">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Nama Unit:</label>
            <input type="text" name="nama_unit" value="<?= $data['nama_unit'] ?? '' ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Keterangan:</label>
            <input type="text" name="keterangan" value="<?= $data['keterangan'] ?? '' ?>">
        </div>

        <div class="flex justify-between">
            <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <?= $id ? 'Update' : 'Simpan' ?>
            </button>
            <a href="index.php" class="text-gray-600 hover:underline mt-2">Batal</a>
        </div>
    </form>
</div>

</body>
</html>