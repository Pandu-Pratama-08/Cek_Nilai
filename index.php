<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Cek Keterangan Nilai</title>
</head>
<body>
<?php
    // Fungsi untuk menampilkan emotikon
    function tampilkanEmotikon($nilai) {
        if ($nilai >= 70 && $nilai <=100) {
            echo '<div class="emoticon"><i class="fas fa-smile"></i></div>'; // Emotikon senyum
        } else if ($nilai <70) {
            echo '<div class="emoticon"><i class="fas fa-sad-tear"></i></div>'; // Emotikon sedih
        } else {
            echo '<div class="emoticon"><i class="fa-regular fa-face-meh-blank"></i></div>';
        }
        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama = $_POST["nama"];
        $nilai = $_POST["nilai"];

        
        // Tampilkan hasil keterangan nilai
         echo "<div class='hasil'>";
         echo "<h3>Rincian Nilai:</h3>";
         echo " $nama<br>";
         echo  "<br>";
         echo "Nilai <br> $nilai<br>";
         echo " <br>";
         if ($nilai >= 70 && $nilai <=100) {
            echo "Kompeten <br>";
         } else if ($nilai <70) {
            echo "Tidak Kompeten <br>";
         } else {
            echo " Input Error! <br>";
         }
        
        // Tampilkan emotikon sesuai dengan keterangan nilai
        echo '<div class="emoticon">';
        tampilkanEmotikon($nilai);
        echo '</div>';
        echo "</div>";
    }
    ?>
    <div class="kotak">
     <h2>Cek Keterangan Nilai</h2>
     <form method="post">
        Nama: <input type="text" name="nama" required><br><br>
        Nilai: <input type="number" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" name="submit" value="Kirim">
     </form>
    </div>

</body>
</html>