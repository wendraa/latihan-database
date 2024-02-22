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
    <h4>Data Barang</h4>
<?php

    //Cek apakah ada nilai dari method GET dengan nama buku1
    if (isset($_GET['Kode_Barang'])) {
        $Kode_Barang=htmlspecialchars($_GET["Kode_Barang"]);

        $sql="delete from barang where Kode_Barang='$Kode_Barang' ";
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
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kode Supplier</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah Barang</th>
            <th>Price</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php

        $sql="select * from barang";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["Kode_Barang"];   ?></td>
                <td><?php echo $data["Nama_Barang"];   ?></td>
                <td><?php echo $data["Kode_Supplier"]; ?></td>
                <td><?php echo date('d F Y',strtotime($data["Tanggal_Masuk"]));   ?></td>
                <td><?php echo $data["Jumlah_Barang"]; ?></td>
                <td><?php echo $data["Price"]; ?></td>
                
                
                <td>
                    <a href="update.php?Kode_Barang=<?php echo htmlspecialchars($data['Kode_Barang']); ?>" class="btn btn-warning" role="button">
                        <ion-icon name="pencil"></ion-icon>
                    </a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?Kode_Barang=<?php echo $data['Kode_Barang']; ?>" class="btn btn-danger" role="button">
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
