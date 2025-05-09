<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Query dayta pasien jika ada ID
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto px-4 py-6 max-w-2x1">
    <h2 class="text-2x1 font-bold mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Data Paramedik</h2>

    <!-- Tombol Kembali -->
     <a href="index.php" class="inline-block mb-4 text-blue-600 hover:underline">← Kembali ke Daftar Paramedik</a>

     <!-- Formulir -->
    <form method="POST" action="paramedik_proses.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

        <div class="mb-4">
            <label class="block text-gray-700">Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>" class="w-full border rounded px-3 py-2"><br>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tempat Lahir:</label>
            <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?? '' ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?? '' ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Gender:</label>
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="">--Pilih--</option>
                <option value="L" <?= isset($data['gender']) && $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= isset($data['gender']) && $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Kategori:</label>
            <input type="text" name="kategori" value="<?= $data['kategori'] ?? '' ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Telpon:</label>
            <input type="text" name="telpon" value="<?= $data['telpon'] ?? '' ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Alamat:</label>
            <textarea name="alamat" class="w-full border rounded px-3 py-2"><?= $data['alamat'] ?? '' ?></textarea>
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