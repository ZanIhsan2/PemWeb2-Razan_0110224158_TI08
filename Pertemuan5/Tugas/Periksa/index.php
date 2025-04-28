<?php
require_once '../dbkoneksi.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Periksa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2x1 font-bold mb-4">Data Pemeriksaan</h1>

    <!-- Tombol Navigasi -->
    <div class="mb-4 flex justify-between">
        <a href="../Dashboard/admin.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Kembali ke Beranda</a>
        <a href="periksa_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Periksa</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Berat</th>
                    <th class="py-2 px-4">Tinggi</th>
                    <th class="py-2 px-4">Tensi</th>
                    <th class="py-2 px-4">Keterangan</th>
                    <th class="py-2 px-4">Pasien</th>
                    <th class="py-2 px-4">Dokter</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->berat ?></td>
                    <td><?= $row->tinggi ?></td>
                    <td><?= $row->tensi ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td><?= $row->nama_pasien ?></td>
                    <td><?= $row->nama_dokter ?></td>
                    <td>
                        <a href="periksa_form.php?id=<?= $row->id ?>" class="text-blue-500 hover:underline">Edit</a>
                        <a href="periksa_proses.php?hapus=1&id=<?= $row->id ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
