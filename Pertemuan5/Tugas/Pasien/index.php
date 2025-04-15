<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM pasien";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<a href="pasien_form.php">+ Tambah Pasien</a>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Tempat, Tgl Lahir</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Kelurahan</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; 
    foreach($rs as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['kode'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['tmp_lahir'] . ', ' . $row['tgl_lahir'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['kelurahan_id'] ?></td>
        <td>
            <a href="pasien_form.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="pasien_proses.php?hapus=1&id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>