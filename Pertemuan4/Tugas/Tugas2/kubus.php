<?php

// Class Kubus
class Kubus{
    public $sisi;

    // Kontruktor Balok
    function __construct($sisi) {
        $this->sisi = $sisi;
    }

    // Method Untuk Menghitung Luas Kubus
    function getLuasPermukaan(){
        $luasKBS = 2 * pow($this->sisi, 2);
        return $luasKBS;
    }

    // Method Untuk Menghitung Keliling Kubus
    function getkeliling(){
        $kelilingKBS = 12 * $this->sisi;
        return $kelilingKBS;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangun Ruang Kubus</title>
</head>
<body>
    <h2>Penggunaan Kubus</h2>

    <?php
    $kubus = new kubus(7);

    echo "Sisi Kubus = ".$kubus->sisi. "<br>";
    echo "Luas Permukaan = " .$kubus->getLuasPermukaan(). "cm^2<br>";
    echo "Keliling Kubus = " .$kubus->getKeliling(). "<br>";
    ?>
</body>
</html>