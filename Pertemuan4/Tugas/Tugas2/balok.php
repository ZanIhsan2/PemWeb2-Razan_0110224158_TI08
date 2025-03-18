<?php

// Class Balok
class Balok{
    public $panjang;
    public $lebar;
    public $tinggi;

    // Kontruktor Balok
    function __construct($panjang, $lebar, $tinggi) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->tinggi = $tinggi;
    }

    // Method Untuk Menghitung Luas Balok
    function getLuas(){
        $luasBLK = 2 * ($this->panjang * $this->lebar + $this->lebar * $this->tinggi + $this->panjang * $this->tinggi);
        return $luasBLK;
    }

    // Method Untuk Menghitung Keliling Balok
    function getKeliling(){
        $kelilingBLK = 4 * ($this->panjang + $this->lebar + $this->tinggi);
        return $kelilingBLK;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangun Ruang Balok</title>
</head>
<body>
    <h2>Penggunaan Balok</h2>

    <?php
    $blk = new Balok(14,20,2);

    echo "Panjang = ".$blk->panjang. "<br>";
    echo "Lebar = " .$blk->lebar. "<br>";
    echo "Tinggi = " .$blk->tinggi. "<br>";
    echo '<hr>';
    echo "Luas = " .$blk->getLuas(). "<br>";
    echo "Keliling = " .$blk->getKeliling(). "<br>";
    ?>
</body>
</html>