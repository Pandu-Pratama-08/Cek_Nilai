<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Cek Keterangan Nilai</title>
</head>

<body>

    <div class="main-container">

        <div class="kotak-form">
            <h2><i class="fas fa-edit"></i> Input Nilai</h2>
            <form method="post">
                <div class="input-group">
                    <label>Nama Peserta</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="input-group">
                    <label>Nilai (0-100)</label>
                    <input type="number" name="nilai" min="0" max="100" placeholder="Contoh: 85" required>
                </div>
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-check-circle"></i> Cek Hasil
                </button>
            </form>
        </div>

        <div class="kotak-hasil">
            <?php
            function tampilkanEmotikon($nilai)
            {
                if ($nilai >= 70 && $nilai <= 100) {
                    return '<i class="fas fa-smile-beam fa-5x"></i>'; // Senyum lebar
                } else if ($nilai >= 0 && $nilai < 70) {
                    return '<i class="fas fa-sad-tear fa-5x"></i>'; // Sedih
                } else {
                    return '<i class="fas fa-question-circle fa-5x"></i>'; // Error
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nama = htmlspecialchars($_POST["nama"]);
                $nilai = $_POST["nilai"];
                $keterangan = "";
                $colorClass = "";

                if ($nilai >= 70 && $nilai <= 100) {
                    $keterangan = "Kompeten";
                    $colorClass = "text-success";
                } else if ($nilai >= 0 && $nilai < 70) {
                    $keterangan = "Tidak Kompeten";
                    $colorClass = "text-danger";
                } else {
                    $keterangan = "Input Error!";
                    $colorClass = "text-warning";
                }

                echo "<div class='hasil-content'>";
                echo "<h3><i class='fas fa-poll-h'></i> Hasil Analisis</h3>";
                echo "<p class='nama-output'>$nama</p>";
                echo "<p class='nilai-output'>$nilai</p>";
                echo "<div class='emoticon $colorClass'>" . tampilkanEmotikon($nilai) . "</div>";
                echo "<p class='keterangan-output $colorClass'>$keterangan</p>";
                echo "</div>";
            } else {
                echo "<div class='hasil-placeholder'>";
                echo "<i class='fas fa-file-invoice fa-5x'></i>";
                echo "<p>Silakan isi data di sebelah kiri</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>