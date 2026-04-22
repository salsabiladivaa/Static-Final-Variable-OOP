<?php

class Matematika {
    // Menambahkan static property untuk label
    public static $label = "penjumlahan math";

    public static function tambah($a, $b) {
        $hasil = $a + $b;
      
        return self::$label . " = " . $hasil;
    }
}

echo Matematika::tambah(5, 3);

?>