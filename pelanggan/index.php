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
    <h4>Data Pelanggan</h4>
<?php

    //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['Kode_Pelanggan'])) {
        $Kode_Pelanggan=htmlspecialchars($_GET["Kode_Pelanggan"]);

        $sql="delete from Pelanggan where Kode_Pelanggan='$Kode_Pelanggan' ";
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
            <th>Kode Pelanggan</th>
            <th>Kode Barang</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php

        $sql="select * from pelanggan";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["Kode_Pelanggan"];   ?></td>
                <td><?php echo $data["Kode_Barang"];   ?></td>
                
                
                <td>
                    <a href="update.php?Kode_Pelanggan=<?php echo htmlspecialchars($data['Kode_Pelanggan']); ?>" class="btn btn-warning" role="button">
                        <ion-icon name="pencil"></ion-icon>
                    </a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Kode_Pelanggan=<?php echo $data['Kode_Pelanggan']; ?>" class="btn btn-danger" role="button">
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
