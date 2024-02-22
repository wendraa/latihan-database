<?php  
    include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Data Supplier</h4>
<?php

    //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['Kode_Supplier'])) {
        $Kode_Supplier=htmlspecialchars($_GET["Kode_Supplier"]);

        $sql="delete from Supplier where Kode_Supplier='$Kode_Supplier' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


<table class="table">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Lokasi</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php

        $sql="select * from Supplier";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["Kode_Supplier"];   ?></td>
                <td><?php echo $data["Nama_Supplier"];   ?></td>
                <td><?php echo $data["Lokasi"]; ?></td>
                
                
                <td>
                    <a href="update.php?Kode_Supplier=<?php echo htmlspecialchars($data['Kode_Supplier']); ?>" class="btn btn-warning" role="button">
                        <ion-icon name="pencil"></ion-icon>
                    </a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Kode_Supplier=<?php echo $data['Kode_Supplier']; ?>" class="btn btn-danger" role="button">
                        <ion-icon name="trash-bin"></ion-icon>
                    </a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">
        <ion-icon name="add-circle"></ion-icon> Tambah Data
    </a>

</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
