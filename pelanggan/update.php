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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['Kode_Pelanggan'])) {
        $Kode_Pelanggan=input($_GET['Kode_Pelanggan']);

        $sql="select * from Pelanggan where Kode_Pelanggan='$Kode_Pelanggan'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Kode_Pelanggan=htmlspecialchars($_POST["Kode_Pelanggan"]);
        $Kode_Barang=htmlspecialchars($_POST["Kode_Barang"]);


        //Query update data pada tabel anggota
        $sql="update Pelanggan set
            Kode_Barang='$Kode_Barang'
            where Kode_Pelanggan='$Kode_Pelanggan'";

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
    <h2>Update Data Pelanggan</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Kode_Barang :</label>
            <input type="text" name="Kode_Barang" class="form-control" value="<?php echo $data['Kode_Barang']; ?>" placeholder="Masukan Kode_Barang" required />
        </div>

        <input type="hidden" name="Kode_Pelanggan" value="<?php echo $data['Kode_Pelanggan']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>