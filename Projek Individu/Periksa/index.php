<?php
require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="content-wrapper py-4 px-4">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Pemeriksaan</h1>
            <a href="periksa_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + Tambah Periksa
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">No</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Tanggal</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Berat</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Tinggi</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Tensi</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Keterangan</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Pasien</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Dokter</th>
                        <th class="py-2 px-2 text-left text-gray-600 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $no = 1; foreach($rs as $row): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-2"><?= $no++ ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['tanggal']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['berat']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['tinggi']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['tensi']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['keterangan']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['nama_pasien']) ?></td>
                        <td class="py-2 px-2"><?= htmlspecialchars($row['nama_dokter'])?></td>
                        <td class="py-2 px-2 space-x-2">
                            <a href="periksa_form.php?id=<?= $row['id'] ?>" class="text-yellow-500 hover:underline">Edit</a>
                            <a href="periksa_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
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
