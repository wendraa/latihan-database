<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
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
    if (isset($_GET['Kode_Supplier'])) {
        $Kode_Supplier=input($_GET['Kode_Supplier']);

        $sql="select * from Supplier where Kode_Supplier='$Kode_Supplier'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_array($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Kode_Supplier=htmlspecialchars($_POST["Kode_Supplier"]);
        $Nama_Supplier=htmlspecialchars($_POST["Nama_Supplier"]);
        $Lokasi=htmlspecialchars($_POST["Lokasi"]);


        //Query update data pada tabel anggota
        $sql="update Supplier set
            Nama_Supplier='$Nama_Supplier',
            Lokasi='$Lokasi'
            where Kode_Supplier='$Kode_Supplier'";

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
    <h2>Update Data Supplier</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Supplier :</label>
            <input type="text" name="Nama_Supplier" class="form-control" value="<?php echo $data['Nama_Supplier']; ?>" placeholder="Masukan Nama Supplier" required />
        </div>
        <div class="form-group">
            <label>Lokasi :</label>
            <input type="text" name="Lokasi" class="form-control" value="<?php echo $data['Lokasi']; ?>" placeholder="Masukan Lokasi" required />
        </div>


        <input type="hidden" name="Kode_Supplier" value="<?php echo $data['Kode_Supplier']; ?>" />

        <button type="submit" name="submit" class="btn btn-success">
            <ion-icon name="checkmark-done-circle"></ion-icon>Submit
        </button>
    </form>
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>