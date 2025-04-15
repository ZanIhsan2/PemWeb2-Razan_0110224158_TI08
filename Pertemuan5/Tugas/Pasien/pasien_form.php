<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Query
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Formulir Pasien -->
<form method="POST" action="pasien_proses.php">
    <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">
    <label>Kode: <input type="text" name="kode" value="<?= $data['kode'] ?? '' ?>"></label><br>
    <label>Nama: <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>"></label><br>
    <label>Tempat Lahir: <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?? '' ?>"></label><br>
    <label>Tgl Lahir: <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?? '' ?>"></label><br>
    <label>Gender:
        <select name="gender">
            <option value="L" <?= isset($data['gender']) && $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= isset($data['gender']) && $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </label><br>
    <label>Email: <input type="email" name="email" value="<?= $data['email'] ?? '' ?>"></label><br>
    <label>Alamat: <textarea name="alamat"><?= $data['alamat'] ?? '' ?></textarea></label><br>
    <label>Kelurahan ID: <input type="number" name="kelurahan_id" value="<?= $data['kelurahan_id'] ?? '' ?>"></label><br>

    <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>">
        <?= $id ? 'Update' : 'Simpan' ?>
    </button>
</form>