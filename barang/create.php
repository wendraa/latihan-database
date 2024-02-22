<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
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

        $Kode_Barang=input($_POST["Kode_Barang"]);
        $Nama_Barang=input($_POST["Nama_Barang"]);
        $Kode_Supplier=input($_POST["Kode_Supplier"]);
        $Tanggal_Masuk=input($_POST["Tanggal_Masuk"]);
        $Jumlah_Barang=input($_POST["Jumlah_Barang"]);
        $Price=input($_POST["Price"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into Barang (Kode_Barang, Nama_Barang, Kode_Supplier, Tanggal_Masuk, Jumlah_Barang, Price) values
		('$Kode_Barang','$Nama_Barang','$Kode_Supplier','$Tanggal_Masuk','$Jumlah_Barang','$Price')";

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
    <h2>Input Data Barang</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="Kode_Barang" class="form-control" placeholder="Masukan Kode Barang" required/>
        </div>
        <div class="form-group">
            <label>Nama Barang :</label>
            <input type="text" name="Nama_Barang" class="form-control" placeholder="Masukan Nama Barang" required/>
        </div>
        <div class="form-group">
            <label>Kode Supplier :</label>
            <input type="text" name="Kode_Supplier" class="form-control" placeholder="Masukan Kode Supplier" required/>
        </div>
        <div class="form-group">
            <label for="Tanggal_Masuk">Tanggal Barang Masuk :</label>
            <input type="date" class="form-control" id="Tanggal_Masuk" name="Tanggal_Masuk">
        </div>
        <div class="form-group">
            <label>Jumlah Barang :</label>
            <input type="text" name="Jumlah_Barang" class="form-control" placeholder="Masukan Jumlah Barang" required/>
        </div>
        <div class="form-group">
            <label>Price :</label>
            <input type="text" name="Price" class="form-control" placeholder="Masukan Harga" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon> Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>