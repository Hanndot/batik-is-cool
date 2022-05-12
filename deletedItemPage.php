<?php
include 'config.php';

error_reporting(0);

$data = mysqli_query($conn, "SELECT A.id_batik, A.nama_batik, A.asal_batik, A.is_delete, B.nama_produsen, B.rating_produsen,
                              A.harga_batik, C.jumlah_stok FROM batik A INNER JOIN produsen B 
                              ON A.id_batik = B.id_batik INNER JOIN stok C ON A.id_batik = C.id_batik WHERE A.is_delete=1");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Batik - Deleted Item</title>
    <div class="edit-item-header">
        <a href="homePage.php">go back</a>
    </div>
</head>

<body>
    <div class="home-title">
        <h1>Batik is Cool<br />Deleted Items</h1>
    </div>
    <div class="list-item-card">
        <div class="card-header">
            Batik is Cool Deleted Item List
        </div>
        <div class="card-body">
            <table class="item-table">
                <tr>
                    <th>No.</th>
                    <th>Batik Name</th>
                    <th>Batik Origin</th>
                    <th>Manufacturer</th>
                    <th>Manufacturer Rating</th>
                    <th>Price</th>
                    <th>Item Stock</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                while ($item = mysqli_fetch_array($data)) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item['nama_batik'] ?></td>
                        <td><?= $item['asal_batik'] ?></td>
                        <td><?= $item['nama_produsen'] ?></td>
                        <td><?= $item['rating_produsen'] ?></td>
                        <td>Rp <?= $item['harga_batik'] ?></td>
                        <td><?= $item['jumlah_stok'] ?></td>
                        <td>
                            <a href="restoreItem.php?id=<?= $item['id_batik'] ?>">Restore</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>