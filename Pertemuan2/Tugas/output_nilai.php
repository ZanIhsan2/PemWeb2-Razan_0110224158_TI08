<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
if (isset($_GET['proses'])) {
    $nama = $_GET['nama'] ?? '';
    $matkul = $_GET['matkul'] ?? '';
    $nilai_uts = $_GET['nilai_uts'] ?? 0;
    $nilai_uas = $_GET['nilai_uas'] ?? 0;
    $nilai_tugas = $_GET['nilai_tugas'] ?? 0;

    // Konversi ke angka
    $nilai_uts = (int) $nilai_uts;
    $nilai_uas = (int) $nilai_uas;
    $nilai_tugas = (int) $nilai_tugas;

    // Perhitungan nilai akhir
    $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.4) + ($nilai_tugas * 0.3);

    // Menentukan predikat
    if ($nilai_akhir >= 80) {
        $predikat = "A (Sangat Baik)";
    } elseif ($nilai_akhir >= 70) {
        $predikat = "B (Baik)";
    } elseif ($nilai_akhir >= 60) {
        $predikat = "C (Cukup)";
    } elseif ($nilai_akhir >= 50) {
        $predikat = "D (Kurang)";
    } else {
        $predikat = "E (Tidak Memadai)";
    }
}
?>
    <div class="container mt-5">
        <h2 class="text-center">Hasil Nilai</h2>
        <div class="card p-4">
            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>Mata Kuliah:</strong> <?= htmlspecialchars($matkul) ?></p>
            <p><strong>Nilai UTS:</strong> <?= $nilai_uts ?></p>
            <p><strong>Nilai UAS:</strong> <?= $nilai_uas ?></p>
            <p><strong>Nilai Tugas:</strong> <?= $nilai_tugas ?></p>
            <p><strong>Nilai Akhir:</strong> <?= $nilai_akhir ?></p>
            <p><strong>Predikat:</strong> <?= $predikat ?></p>
        </div>
        <a href="nilai.php" class="btn btn-primary mt-3">Kembali</a>
    </div>

</body>
</html>