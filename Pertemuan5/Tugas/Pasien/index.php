<?php
// Koenksi Database
require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Ambil data pasien
$sql = "SELECT pasien.*, kelurahan.nama_kelurahan AS nama_kelurahan FROM pasien
        LEFT JOIN kelurahan ON pasien.kelurahan_id = kelurahan.id";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">

<div class="content-wrapper">
    <h1 class="text-2xl font-bold mb-4">Data Pasien</h1>

    <div class="content">
    <!-- Tombol navigasi -->
    <div class="mb-4 flex justify-between">
        <a href="../Dashboard/admin.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Kembali</a>
        <a href="pasien_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Pasien</a>
    </div>
    

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-1">No</th>
                    <th class="py-2 px-1">Kode</th>
                    <th class="py-2 px-1">Nama</th>
                    <th class="py-2 px-1">Tempat, Tgl Lahir</th>
                    <th class="py-2 px-1">Gender</th>
                    <th class="py-2 px-1">Email</th>
                    <th class="py-2 px-1">Alamat</th>
                    <th class="py-2 px-1">Kelurahan</th>
                    <th class="py-2 px-1">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4"><?= $no++ ?></td>
                    <td class="py-2 px-4"><?= $row['kode'] ?></td>
                    <td class="py-2 px-4"><?= $row['nama'] ?></td>
                    <td class="py-2 px-4"><?= $row['tmp_lahir'] . ', ' . $row['tgl_lahir'] ?></td>
                    <td class="py-2 px-4"><?= $row['gender'] ?></td>
                    <td class="py-2 px-4"><?= $row['email'] ?></td>
                    <td class="py-2 px-4"><?= $row['alamat'] ?></td>
                    <td class="py-2 px-4"><?= $row['nama_kelurahan'] ?></td>
                    <td class="py-2 px-4">
                        <a href="pasien_form.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="pasien_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
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