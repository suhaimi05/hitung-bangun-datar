<?php
    // FUNGSI MENGHITUNG LUAS SEGITIGA
    // RUMUS : (alas x tinggi) / 2
    function segitiga($alas, $tinggi)
    {
        return ($alas * $tinggi) / 2;
    }

    // FUNGSI MENGHITUNG LUAS PERSEGI
    // RUMUS : sisi x sisi
    function persegi($sisi)
    {
        return $sisi * $sisi;
    }

    // FUNGSI MENGHITUNG LUAS LINGKARAN
    // RUMUS : phi x r x r
    function lingkaran($jari)
    {
        return 3.14 * ($jari * $jari);
    }
?>