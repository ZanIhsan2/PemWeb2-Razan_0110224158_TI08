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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit Kerja</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">
<div class="content-wrapper">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Unit Kerja</h1>
            <a href="unit_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + Tambah Unit Kerja
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Kode Unit</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Nama Unit</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Keterangan</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $no++ ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($row['kode_unit']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($row['nama_unit']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($row['keterangan']) ?></td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="unit_form.php?id=<?= $row['id'] ?>" class="text-yellow-600 hover:underline">Edit</a>
                        <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-600 hover:underline"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-6">
            <a href="../Dashboard/admin.php" class="text-blue-500 hover:underline text-sm">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
</body>
</html>

<?php include '../Dashboard/footer.php'; ?>
