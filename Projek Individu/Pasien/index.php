<?php

require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Ambil data pasien dan nama kelurahan
$sql = "SELECT pasien.*, kelurahan.nama_kelurahan AS nama_kelurahan 
        FROM pasien 
        LEFT JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="content-wrapper py-4 px-4">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Pasien</h1>
            <a href="pasien_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + Tambah Pasien
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-2 px-2">No</th>
                        <th class="py-2 px-2">Kode</th>
                        <th class="py-2 px-2">Nama</th>
                        <th class="py-2 px-2">Tempat, Tgl Lahir</th>
                        <th class="py-2 px-2">Gender</th>
                        <th class="py-2 px-2">Email</th>
                        <th class="py-2 px-2">Alamat</th>
                        <th class="py-2 px-2">Kelurahan</th>
                        <th class="py-2 px-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $no = 1; foreach($rs as $row): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-2"><?= $no++ ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['kode']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['nama']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['tmp_lahir'] . ', ' . $row['tgl_lahir']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['gender']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['email']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['alamat']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['nama_kelurahan']) ?></td>
                        <td class="py-2 px-2 space-x-2">
                            <a href="pasien_form.php?id=<?= $row['id'] ?>" class="text-yellow-500 hover:underline">Edit</a>
                            <a href="pasien_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
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
