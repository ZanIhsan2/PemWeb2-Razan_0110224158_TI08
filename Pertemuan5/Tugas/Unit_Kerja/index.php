<?php
// Koneksi Database
require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Definisi Query
$sql = "SELECT * FROM unit_kerja";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Unit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">
<div class="container mx-auto px-2">
    <div class="content-wrapper">
    <h1 class="text-2x1 font-bold mb-4">Data Unit Kerja</h1>

    <!-- Tombol Navigasi -->
     <div class="mb-4 flex justify-between">
        <a href="../Dashboard/admin.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Kembali ke Beranda</a>
        <a href="unit_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Unit Kerja</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Kode Unit</th>
                    <th class="py-2 px-4">Nama Unit</th>
                    <th class="py-2 px-4">Keterangan</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                    <tr>
                        <td class="py-2 px-4"><?= $no++ ?></td>
                        <td class="py-2 px-4"><?= $row['kode_unit'] ?></td>
                        <td class="py-2 px-4"><?= $row['nama_unit'] ?></td>
                        <td class="py-2 px-4"><?= $row['keterangan'] ?></td>
                        <td>
                            <a href="unit_form.php?id=<?= $row['id'] ?>" class="text-blue-600">Edit</a> |
                            <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-600" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                     </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

</body>
</html>
<?php include '../Dashboard/footer.php'; ?>