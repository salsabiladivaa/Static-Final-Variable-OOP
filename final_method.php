<?php

class Kendaraan {
    // Method ini bersifat final, artinya tidak boleh diubah (override) oleh class anak
    final public function mesin() {
        echo "Mesin standar";
    }
}

class Mobil extends Kendaraan {
    // Bagian ini akan menyebabkan ERROR fatal
    // Karena kita mencoba melakukan override pada method yang bersifat final
    public function mesin() {
        echo "Mesin mobil";
    }
}

?>