<?php

include 'config.php';

error_reporting(0);

$bTable = mysqli_query($conn, "SELECT * FROM batik");

if (isset($_POST['submit'])) {
    $id_batik = $_POST['bID'];
    $jumlah_stok = $_POST['bStock'];

    $res = mysqli_query($conn, "INSERT INTO stok(id_batik, jumlah_stok)
                                VALUES ($id_batik, $jumlah_stok)");

    if ($res) {
        echo "Adding Manufacturer is Successful! <a href='homePage.php'>Home Page</a>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Batik - Add Stock</title>
    <div class="add-stok-header">
        <a href="homePage.php">go back</a>
    </div>
</head>

<body>
    <div class="list-item-card">
        <div class="add-stok-title">
            <h1>Add Stock Form</h1>
        </div>
        <div class="card-header">
            Batik List
        </div>
        <div class="card-body">
            <table class="item-table">
                <tr>
                    <th>Batik ID</th>
                    <th>Batik Name</th>
                    <th>Batik Origin</th>
                    <th>Price</th>
                    <?php
                    while ($item = mysqli_fetch_array($bTable)) :
                    ?>
                <tr>
                    <td><?= $item['id_batik'] ?></td>
                    <td><?= $item['nama_batik'] ?></td>
                    <td><?= $item['asal_batik'] ?></td>
                    <td>Rp <?= $item['harga_batik'] ?></td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        <div class="card-body">
            <form class="item-form" method="POST" action="">
                <div class="form-group">
                    <label>Batik ID</label>
                    <input type="text" name="bID" placeholder="Input batik ID." required>
                </div>
                <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="bStock" placeholder="Input available stock." required>
                </div>
                <div class="submit-group">
                    <button class="submit-btn" type="submit" name="submit">Submit</button>
                    <button class="reset-btn" type="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>