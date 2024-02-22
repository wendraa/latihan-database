<?php  
    include "../koneksi.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['Kode_Pelanggan'])) {
        $Kode_Pelanggan=input($_GET['Kode_Pelanggan']);

        $sql="delete from Pelanggan where Kode_Pelanggan='$Kode_Pelanggan'";
        $hasil=mysqli_query($kon,$sql);
        echo "<script>alert('Data Berhasil Dihapus');window.location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='index.php';</script>";
    }
?>
