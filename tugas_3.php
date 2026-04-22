<?php
date_default_timezone_set('Asia/Jakarta');

class Produk {
    public static $jumlahProduk = 0;
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
        self::$jumlahProduk++;
    }
}

class Transaksi {
    final public function prosesTransaksi($produk) {
        echo "<div class='invoice-item'>
                <span>{$produk->nama}</span>
                <span>Rp " . number_format($produk->harga, 0, ',', '.') . "</span>
              </div>";
    }
}

$p1 = new Produk("Cushion Skintific", 150000); 
$p2 = new Produk("Lipcream Implora", 25000);
$p3 = new Produk("Sunscreen Wardah", 75000);
$p4 = new Produk("Foundation Maybelline", 120000);
$p5 = new Produk("Mascara Wardah", 50000);

$subtotal = $p1->harga + $p2->harga + $p3->harga + $p4->harga + $p5->harga;
$pajak = $subtotal * 0.11; // PPN 11%
$totalAkhir = $subtotal + $pajak;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=JetBrains+Mono:wght@500&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: #e2e8f0; 
            display: flex; justify-content: center; padding: 40px 20px;
        }

        .invoice { 
            width: 100%; max-width: 450px; 
            background: white; padding: 40px; 
            border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .store-header { text-align: center; margin-bottom: 30px; }
        .store-name { font-size: 1.5rem; font-weight: 600; color: #0f172a; margin: 0; }
        .store-info { font-size: 0.8rem; color: #64748b; margin-top: 5px; }

        .meta-data { margin-bottom: 20px; font-size: 0.85rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 15px; }
        .meta-row { display: flex; justify-content: space-between; margin-bottom: 5px; }

        .invoice-item { 
            display: flex; justify-content: space-between; 
            margin-bottom: 10px; font-size: 0.9rem; color: #334155;
        }

        .totals { margin-top: 20px; border-top: 2px solid #f1f5f9; padding-top: 20px; }
        .total-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-family: 'JetBrains Mono', monospace; }
        .total-row.grand-total { font-weight: 600; font-size: 1.1rem; color: #0f172a; margin-top: 10px; }

        .footer { text-align: center; margin-top: 40px; font-size: 0.75rem; color: #94a3b8; }
    </style>
</head>
<body>

    <div class="invoice">
        <div class="store-header">
            <h1 class="store-name">GLOW BEAUTY</h1>
            <p class="store-info">Jl. Mawar No. 123, Bondowoso</p>
        </div>

        <div class="meta-data">
            <div class="meta-row"><span>Inv No:</span> <span>#INV-<?php echo date('YmdHis'); ?></span></div>
            <div class="meta-row"><span>Tanggal:</span> <span><?php echo date('d M Y, H:i'); ?> WIB</span></div>
        </div>

        <div class="items">
            <?php
            $transaksi = new Transaksi();
            $transaksi->prosesTransaksi($p1);
            $transaksi->prosesTransaksi($p2);
            $transaksi->prosesTransaksi($p3);
            $transaksi->prosesTransaksi($p4);
            $transaksi->prosesTransaksi($p5);
            ?>
        </div>

        <div class="totals">
            <div class="total-row"><span>Subtotal</span> <span>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span></div>
            <div class="total-row"><span>PPN (11%)</span> <span>Rp <?php echo number_format($pajak, 0, ',', '.'); ?></span></div>
            <div class="total-row grand-total"><span>TOTAL</span> <span>Rp <?php echo number_format($totalAkhir, 0, ',', '.'); ?></span></div>
        </div>

        <div class="footer">
            Terima kasih telah berbelanja di Glow Beauty.<br>
            Simpan struk ini sebagai bukti pembayaran yang sah.
        </div>
    </div>

</body>
</html>