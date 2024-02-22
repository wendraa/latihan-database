<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "../koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Kode_Pelanggan=input($_POST["Kode_Pelanggan"]);
        $Kode_Barang=input($_POST["Kode_Barang"]);


        //Query input menginput data kedalam tabel anggota
        $sql="insert into Pelanggan (Kode_Pelanggan, Kode_Barang) values
		('$Kode_Pelanggan','$Kode_Barang')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo mysqli_error($kon);

        }

    }
    ?>
    <h2>Input Data Pelanggan</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Kode Pelanggan :</label>
            <input type="text" name="Kode_Pelanggan" class="form-control" placeholder="Masukan Kode Pelanggan" required/>
        </div>
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="Kode_Barang" class="form-control" placeholder="Masukan Kode Barang" required/>
        </div>
        

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon> Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>