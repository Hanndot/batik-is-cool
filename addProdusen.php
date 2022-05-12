<?php

include 'config.php';

error_reporting(0);

$bTable = mysqli_query($conn, "SELECT * FROM batik");

if (isset($_POST['submit'])) {
    $id_batik = $_POST['bID'];
    $nama_produsen = $_POST['bManufacturer'];
    $rating_produsen = $_POST['bManufRating'];

    $res = mysqli_query($conn, "INSERT INTO produsen(id_batik, nama_produsen, rating_produsen)
                                VALUES ($id_batik,'$nama_produsen','$rating_produsen')");
    
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
    <title>Batik - Add Manufacturer</title>
    <div class="add-produsen-header">
        <a href="homePage.php">go back</a>
    </div>
</head>

<body>
    <div class="list-item-card">
        <div class="add-produsen-title">
            <h1>Add Manufacturer Form</h1>
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
                    <label>Manufacturer</label>
                    <input type="text" name="bManufacturer" placeholder="Input batik manufacturer." required>
                </div>
                <div class="form-group">
                    <label>Manufacturer Rating</label>
                    <input type="text" name="bManufRating" placeholder="Input manufacturer rating." required>
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