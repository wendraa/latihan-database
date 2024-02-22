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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['Kode_Barang'])) {
        $Kode_Barang=input($_GET['Kode_Barang']);

        $sql="select * from Barang where Kode_Barang='$Kode_Barang'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Kode_Barang=htmlspecialchars($_POST["Kode_Barang"]);
        $Nama_Barang=htmlspecialchars($_POST["Nama_Barang"]);
        $Kode_Supplier=htmlspecialchars($_POST["Kode_Supplier"]);
        $Tanggal_Masuk=input($_POST["Tanggal_Masuk"]);
        $Jumlah_Barang=htmlspecialchars($_POST["Jumlah_Barang"]);
        $Price=htmlspecialchars($_POST["Price"]);


        //Query update data pada tabel anggota
        $sql="update Barang set
            Nama_Barang='$Nama_Barang',
            Kode_Supplier='$Kode_Supplier',
            Tanggal_Masuk='$Tanggal_Masuk',
            Jumlah_Barang='$Jumlah_Barang',
            Price='$Price'
            where Kode_Barang='$Kode_Barang'";

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
    <h2>Update Data Barang</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Barang :</label>
            <input type="text" name="Nama_Barang" class="form-control" value="<?php echo $data['Nama_Barang']; ?>" placeholder="Masukan Nama Barang" required />
        </div>
        <div class="form-group">
            <label>Kode Supplier :</label>
            <input type="text" name="Kode_Supplier" class="form-control" value="<?php echo $data['Kode_Supplier']; ?>" placeholder="Masukan Kode Supplier" required />
        </div>
        <div class="form-group">
            <label for="Tanggal_Masuk">Tanggal Masuk :</label>
            <input type="date" class="form-control" id="Tanggal_Masuk" name="Tanggal_Masuk">
        </div>
        <div class="form-group">
            <label>Jumlah Barang :</label>
            <input type="text" name="Jumlah_Barang" class="form-control" value="<?php echo $data['Jumlah_Barang']; ?>" placeholder="Masukan Jumlah Barang" required />
        </div>
        <div class="form-group">
            <label>Harga :</label>
            <input type="text" name="Price" class="form-control" value="<?php echo $data['Price']; ?>" placeholder="Masukan Harga" required />
        </div>

        <input type="hidden" name="Kode_Barang" value="<?php echo $data['Kode_Barang']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>