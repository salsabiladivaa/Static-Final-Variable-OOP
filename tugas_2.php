<?php
class Matematika {
    public static function kali($a, $b) { return $a * $b; }
    public static function bagi($a, $b) { return $a / $b; }
    public static function tambah($a, $b) { return $a + $b; }
    public static function kurang($a, $b) { return $a - $b; }
    public static function luasPersegi($sisi) { return $sisi * $sisi; }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #e0eafc, #cfdef3); 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card { 
            width: 350px; 
            padding: 30px; 
            background: white; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
        }

        h2 { color: #1e3a8a; font-weight: 600; margin-bottom: 25px; text-align: center; }

        label { display: block; margin-bottom: 5px; color: #475569; font-size: 0.9rem; }
        
        input { 
            width: 100%; padding: 12px; margin-bottom: 20px; 
            border: 1px solid #e2e8f0; border-radius: 10px; 
            box-sizing: border-box; font-size: 1rem;
        }

        button { 
            width: 100%; padding: 12px; border: none; border-radius: 10px;
            background: #2563eb; color: white; font-weight: 600; cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover { background: #1d4ed8; }

        .result-box { 
            margin-top: 25px; padding: 20px; 
            background: #f8fafc; border-radius: 12px; 
            border: 1px solid #e2e8f0;
        }

        .result-row { 
            display: flex; justify-content: space-between; 
            margin-bottom: 8px; color: #334155; 
        }

        .val { font-weight: 600; color: #1e293b; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Kalkulator</h2>
        <form method="POST">
            <label>Angka Pertama</label>
            <input type="number" name="angka1" required>
            <label>Angka Kedua</label>
            <input type="number" name="angka2" required>
            <button type="submit" name="hitung">Hitung Sekarang</button>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            $a = (float)$_POST['angka1'];
            $b = (float)$_POST['angka2'];

            echo "<div class='result-box'>";
            echo "<div class='result-row'><span>Tambah</span> <span class='val'>".Matematika::tambah($a, $b)."</span></div>";
            echo "<div class='result-row'><span>Kurang</span> <span class='val'>".Matematika::kurang($a, $b)."</span></div>";
            echo "<div class='result-row'><span>Kali</span> <span class='val'>".Matematika::kali($a, $b)."</span></div>";
            
            echo "<div class='result-row'><span>Bagi</span> <span class='val'>";
            echo ($b == 0) ? "Error" : Matematika::bagi($a, $b);
            echo "</span></div>";
            
            echo "<div class='result-row'><span>Luas Persegi</span> <span class='val'>".Matematika::luasPersegi($a)."</span></div>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>