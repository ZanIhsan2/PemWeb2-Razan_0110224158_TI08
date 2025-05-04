<?php
// Koneksi ke Database
require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Definisi Query
$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Paramedik</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="content-wrapper py-4 px-4">
    <div class="max-w-6x1 mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Paramedik</h1>
            <a href="paramedik_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + Tambah Paramedik
            </a>
        </div>

    <div class="overflow-x-auto">    
        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">No</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Nama</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Gender</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Tempat, Tgl Lahir</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Kategori</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Telepon</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Alamat</th>
                    <th class="px-1 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $no = 1; foreach($rs as $row): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-1 py-2"><?= $no++ ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['nama']) ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['gender']) ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['tmp_lahir'] . ', ' . $row['tgl_lahir']) ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['kategori']) ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['telpon']) ?></td>
                        <td class="px-1 py-2"><?= htmlspecialchars($row['alamat']) ?></td>
                        <td class="px-1 py-2 space-x-2">
                            <a href="paramedik_form.php?id=<?= $row['id'] ?>" class="text-yellow-500 hover:underline">Edit</a>
                            <a href="paramedik_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-500 hover:underline"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="../Dashboard/admin.php" class="text-blue-500 hover:underline text-sm">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
</body>
</html>

<?php include '../Dashboard/footer.php'; ?>
