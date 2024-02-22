<?php  
    include "../koneksi.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['Kode_Supplier'])) {
        $Kode_Supplier=input($_GET['Kode_Supplier']);

        $sql="delete from Supplier where Kode_Supplier='$Kode_Supplier'";
        $hasil=mysqli_query($kon,$sql);
        echo "<script>alert('Data Berhasil Dihapus');window.location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Data Gagal Dihapus');window.location.href='index.php';</script>";
    }
?>
