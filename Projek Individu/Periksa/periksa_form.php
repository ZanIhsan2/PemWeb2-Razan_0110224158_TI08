<?php
// Koneksi ke database
require_once '../dbkoneksi.php';

// Ambil daftar pasien
$sql_pasien = "SELECT id, nama FROM pasien";
$stmt_pasien = $dbh->query($sql_pasien);
$pasien = $stmt_pasien->fetchAll(PDO::FETCH_ASSOC);

// Ambil daftar dokter (paramedik)
$sql_dokter = "SELECT id, nama FROM paramedik";
$stmt_dokter = $dbh->query($sql_dokter);
$dokter = $stmt_dokter->fetchAll(PDO::FETCH_ASSOC);

// Query data pasien jika ada ID
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto px-4 py-6 max-w-2x1">
    <h2 class="text-2x1 font-bold mb-4"><?= $id ? 'Edit' : 'Tambah' ?>Data Periksa</h2>

    <!-- Tombol Kembali -->
     <a href="index.php" class="inline-block mb-4 text-blue-600 hover:underline">← Kembali ke Daftar Pasien</a>

     <!-- Formulir -->
    <form method="POST" action="periksa_proses.php" class="bg-white shdow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

        <div class="mb-4">
            <label class="block text-gray-700">Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?? '' ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Berat (kg):</label>
            <input type="number" name="berat" step="0.1" value="<?= $data['berat'] ?? '' ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tinggi (cm):</label>
            <input type="number" name="tinggi" step="0.1" value="<?= $data['tinggi'] ?? '' ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tensi:</label>
            <input type="text" name="tensi" value="<?= $data['tensi'] ?? '' ?>">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Keterangan:</label>
            <textarea name="keterangan"><?= $data['keterangan'] ?? '' ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="pasien_id">Pasien:</label>
            <select name="pasien_id" id="pasien_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Pasien --</option>
                    <?php foreach ($pasien as $ps): ?>
                <option value="<?= $ps['id'] ?>" <?= (isset($data['pasien_id']) && $ps['id'] == $data['pasien_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($ps['nama']) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="dokter_id">Dokter:</label>
            <select name="dokter_id" id="dokter_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Dokter --</option>
                    <?php foreach ($dokter as $dr): ?>
                <option value="<?= $dr['id'] ?>" <?= (isset($data['dokter_id']) && $dr['id'] == $data['dokter_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($dr['nama']) ?>
                </option>
                <?php endforeach; ?>
            </select>
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
