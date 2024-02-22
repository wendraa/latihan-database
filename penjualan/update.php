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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['Kode_Penjualan'])) {
        $Kode_Penjualan=input($_GET['Kode_Penjualan']);

        $sql="select * from penjualan where Kode_Penjualan='$Kode_Penjualan'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Kode_Penjualan=htmlspecialchars($_POST["Kode_Penjualan"]);
        $Kode_Barang=htmlspecialchars($_POST["Kode_Barang"]);
        $Kode_Pelanggan=htmlspecialchars($_POST["Kode_Pelanggan"]);
        $Banyaknya=htmlspecialchars($_POST["Banyaknya"]);
        $Total_Transaksi=htmlspecialchars($_POST["Total_Transaksi"]);


        //Query update data pada tabel anggota
        $sql="update Penjualan set
            Kode_Barang='$Kode_Barang',
            Kode_Pelanggan='$Kode_Pelanggan',
            Banyaknya='$Banyaknya',
            Total_Transaksi='$Total_Transaksi'
            where Kode_Penjualan='$Kode_Penjualan'";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data Penjualan</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Kode Barang :</label>
            <input type="text" name="Kode_Barang" class="form-control" value="<?php echo $data['Kode_Barang']; ?>" placeholder="Masukan Kode Barang" required />
        </div>
        <div class="form-group">
            <label>Kode Pelanggan :</label>
            <input type="text" name="Kode_Pelanggan" class="form-control" value="<?php echo $data['Kode_Pelanggan']; ?>" placeholder="Masukan Kode Pelanggan" required />
        </div>
        <div class="form-group">
            <label>Banyaknya :</label>
            <input type="text" name="Banyaknya" class="form-control" value="<?php echo $data['Banyaknya']; ?>" placeholder="Masukan Banyaknya Barang" required />
        </div>
        <div class="form-group">
            <label>Total_Transaksi :</label>
            <input type="text" name="Total_Transaksi" class="form-control" value="<?php echo $data['Total_Transaksi']; ?>" placeholder="Masukan Total Transaksi" required />
        </div>

        <input type="hidden" name="Kode_Penjualan" value="<?php echo $data['Kode_Penjualan']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>