<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
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

        $Kode_Penjualan=input($_POST["Kode_Penjualan"]);
        $Kode_Barang=input($_POST["Kode_Barang"]);
        $Kode_Pelanggan=input($_POST["Kode_Pelanggan"]);
        $Banyaknya=input($_POST["Banyaknya"]);
        $Total_Transaksi=input($_POST["Total_Transaksi"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into Penjualan (Kode_Penjualan, Kode_Barang, Kode_Pelanggan, Banyaknya, Total_Transaksi) values
		('$Kode_Penjualan','$Kode_Barang','$Kode_Pelanggan','$Banyaknya','$Total_Transaksi')";

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
    <h2>Input Data Penjualan</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Kode Penjualan :</label>
            <input type="text" name="Kode_Penjualan" class="form-control" placeholder="Masukan Kode Penjualan" required/>
        </div>
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="Kode_Barang" class="form-control" placeholder="Masukan Kode Barang" required/>
        </div>
        <div class="form-group">
            <label>Kode Pelanggan :</label>
            <input type="text" name="Kode_Pelanggan" class="form-control" placeholder="Masukan Kode Pelanggan" required/>
        </div>
        <div class="form-group">
            <label>Banyaknya :</label>
            <input type="text" name="Banyaknya" class="form-control" placeholder="Masukan Banyaknya Barang" required/>
        </div>
        <div class="form-group">
            <label>Total Transaksi :</label>
            <input type="text" name="Total_Transaksi" class="form-control" placeholder="Masukan Total Transaksi" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon> Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>