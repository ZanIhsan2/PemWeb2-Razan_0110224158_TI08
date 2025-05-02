<?php
// Koneksi ke Database
require_once '../dbkoneksi.php';
include '../Dashboard/header.php';
include '../Dashboard/sidebar.php';

// Definisi Query
$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">
<div class="container mx-auto px-2">
    <div class="content-wrapper">
    <h1 class="text-2x1 font-bold mb-4">Data Paramedik</h1>

    <!-- Tombol Navigasi -->
     <div class="mb-4 flex justify-between">
        <a href="../Dashboard/admin.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">← Kembali ke Beranda</a>
        <a href="paramedik_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Pasien</a>
     </div>

     <div class="overflow-x-auto">
        <!-- Table Paramedik -->
        <table class="min-w-full bg-whie shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Gender</th>
                    <th class="py-2 px-4">Tempat, Tgl Lahir</th>
                    <th class="py-2 px-4">Kategori</th>
                    <th class="py-2 px-4">Telpon</th>
                    <th class="py-2 px-4">Alamat</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1;foreach($rs as $row){
                ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4"><?= $no++ ?></td>
                    <td class="py-2 px-4"><?= $row->nama ?></td>
                    <td class="py-2 px-4"><?= $row->gender ?></td>
                    <td class="py-2 px-4"><?= $row->tmp_lahir . ', ' . $row->tgl_lahir ?></td>
                    <td class="py-2 px-4"><?= $row->kategori ?></td>
                    <td class="py-2 px-4"><?= $row->telpon ?></td>
                    <td class="py-2 px-4"><?= $row->alamat ?></td>
                    <td class="py-2 px-4">
                        <a href="paramedik_form.php?id=<?= $row->id ?>">Edit</a> |
                        <a href="paramedik_proses.php?hapus=1&id=<?= $row->id ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                     </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</body>
</html>
<?php include '../Dashboard/footer.php'; ?>