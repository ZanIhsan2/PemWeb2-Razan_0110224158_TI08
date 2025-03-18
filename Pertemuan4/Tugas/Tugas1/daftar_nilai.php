<?php 
require_once 'nilai_mahasiswa.php';

$data_mhs =[];

// Data Awal
$data_mhs[] = new NilaiMahasiswa("Razan Muhammad Ihsan Rismawandi", "Pemrograman Web", 78, 89, 80);
$data_mhs[] = new NilaiMahasiswa("Muhammad Pramagusti", "Pemrograman Web", 47, 68, 85);
$data_mhs[] = new NilaiMahasiswa("Fajar Adityo Kunjtoro", "Pemrograman Web", 57, 78, 75);

// Proses data jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $matakuliah = $_POST["matkul"];
    $nilai_uts = $_POST["uts"];
    $nilai_uas = $_POST["uas"];
    $nilai_tugas = $_POST["tugas"];

    // Bikin objek NilaiMahasiswa dan masukan ke dalam array  
    $data_mhs[] = new NilaiMahasiswa($nama, $matakuliah, $nilai_uts, $nilai_uas, $nilai_tugas);
}
?>

<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }
        h2, h3 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: green;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background: darkgreen;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: green;
            color: white;
        }
        td {
            background: skyblue;
        }
    </style>
</head>
<body>
<h2>Input Data Mahasiswa</h2>

<form method="POST">
    <label for="">Nama</label>
    <input type="text" name="nama" id=""> <br><br>
    <label for="">Mata Kuliah</label>
    <select name="matkul">
        <option value="Pemrograman Web 2">Pemrograman Web 2</option>
        <option value="UI/UX">User Interface dan User Experience</option>
        <option value="Komunikasi Efektif">Komunikasi Efektif</option>
        <option value="Bahasa Inggris 1">Bahasa Inggris 1</option>
    </select> <br> <br>
    <label for="">Nilai UTS</label>
    <input type="number" name="uts" id=""> <br><br>
    <label for="">Nilai UAS</label>
    <input type="number" name="uas" id=""> <br><br>
    <label for="">Nilai Tugas</label>
    <input type="number" name="tugas" id=""> <br><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<h3>Daftar Nilai Mahasiswa</h3>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Akhir</th>
            <th>Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach($data_mhs as $mhs){
            echo "<tr>";
            echo "<td>".$nomor."</td>";
            echo "<td>".$mhs->nama."</td>";
            echo "<td>".$mhs->matakuliah."</td>";
            echo "<td>".$mhs->nilai_uts."</td>";
            echo "<td>".$mhs->nilai_uas."</td>";
            echo "<td>".$mhs->nilai_tugas."</td>";
            echo "<td>". number_format($mhs->getNA(), 2). "</td>";
            echo "<td>".$mhs->kelulusan(). "</td>";
            echo "</tr>";
            $nomor++;
        }

        ?>
    </tbody>
</table>
</body>
</html>