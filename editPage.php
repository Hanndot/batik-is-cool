<?php

include 'config.php';

error_reporting(0);

$id = $_GET['id'];

// Edit batik table logic start
$bTable = mysqli_query($conn, "SELECT * FROM batik WHERE id_batik=$id");
$bTableValue = mysqli_query($conn, "SELECT * FROM batik WHERE id_batik=$id");

while ($bFetch = mysqli_fetch_array($bTableValue)) {
    $name = $bFetch['nama_batik'];
    $origin = $bFetch['asal_batik'];
    $price = $bFetch['harga_batik'];
}

if (isset($_POST['submitBatik'])) {
    $nama_batik = $_POST['bName'];
    $asal_batik = $_POST['bOrigin'];
    $harga_batik = $_POST['bPrice'];

    $insertBatik = mysqli_query($conn, "UPDATE batik SET nama_batik='$nama_batik', asal_batik='$asal_batik',
                                        harga_batik=$harga_batik WHERE id_batik=$id");

    if ($insertBatik) {
        echo "Edit Batik Data is Successful! <a href='editPage.php?id=$id'>Refresh</a>";
    }
}
// Edit batik table logic end

// Edit produsen table logic start
$pTable = mysqli_query($conn, "SELECT * FROM produsen WHERE id_batik=$id");
$pTableValue = mysqli_query($conn, "SELECT * FROM produsen WHERE id_batik=$id");

while ($pFetch = mysqli_fetch_array($pTableValue)) {
    $manuf = $pFetch['nama_produsen'];
    $manufRating = $pFetch['rating_produsen'];
}

if (isset($_POST['submitProdusen'])) {
    $nama_produsen = $_POST['bManufacturer'];
    $rating_produsen = $_POST['bManufRating'];

    $insertProdusen = mysqli_query($conn, "UPDATE produsen SET nama_produsen='$nama_produsen', rating_produsen='$rating_produsen'
                                           WHERE id_batik=$id");

    if ($insertProdusen) {
        echo "Edit Manufacturer Data is Successful! <a href='editPage.php?id=$id'>Refresh</a>";
    }
}
// Edit produsen table logic end

// Edit stok tbale logic start
$sTable = mysqli_query($conn, "SELECT * FROM stok WHERE id_batik=$id");
$sTableValue = mysqli_query($conn, "SELECT * FROM stok WHERE id_batik=$id");

while ($sFetch = mysqli_fetch_array($sTableValue)) {
    $stock = $sFetch['jumlah_stok'];
}

if (isset($_POST['submitStok'])) {
    $jumlah_stok = $_POST['bStock'];

    $insertStok = mysqli_query($conn, "UPDATE stok SET jumlah_stok=$jumlah_stok WHERE id_batik=$id");

    if ($insertStok) {
        echo "Edit Stock Data is Successful! <a href='editPage.php?id=$id'>Refresh</a>";
    }
}
// Edit stok table logic end

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Batik - Edit Item</title>
    <div class="edit-item-header">
        <a href="homePage.php">go back</a>
    </div>
</head>

<body>
    <div class="home-title">
        <h1>Batik is Cool<br />Edit Page</h1>
    </div>
    <!-- Edit Batik Data Start -->
    <div class="list-item-card">
        <div class="add-stok-title">
            <h1>Edit Batik Data</h1>
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
                    <label>Batik Name</label>
                    <input type="text" name="bName" placeholder="Input batik name." value="<?php echo $name; ?>" required>
                </div>
                <div class="form-group">
                    <label>Batik Origin</label>
                    <input type="text" name="bOrigin" placeholder="Input batik origin." value="<?php echo $origin; ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label>Manufacturer</label>
                    <input type="text" name="bManufacturer" placeholder="Input batik manufacturer." required>
                </div>
                <div class="form-group">
                    <label>Manufacturer Rating</label>
                    <input type="text" name="nManufRating" placeholder="Input manufacturer rating." required>
                </div> -->
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="bPrice" placeholder="Input batik price." value="<?php echo $price; ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="bStock" placeholder="Input available stock." required>
                </div> -->
                <div class="submit-group">
                    <button class="submit-btn" type="submit" name="submitBatik">Edit</button>
                    <button class="reset-btn" type="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Batik Data End -->

    <!-- Edit Manufacturer Data Start -->
    <div class="list-item-card">
        <div class="add-stok-title">
            <h1>Edit Manufacturer Data</h1>
        </div>
        <div class="card-header">
            Manufacturer List
        </div>
        <div class="card-body">
            <table class="item-table">
                <tr>
                    <th>Batik ID</th>
                    <th>Manufacturer</th>
                    <th>Manufacturer Rating</th>
                    <?php
                    while ($item = mysqli_fetch_array($pTable)) :
                    ?>
                <tr>
                    <td><?= $item['id_batik'] ?></td>
                    <td><?= $item['nama_produsen'] ?></td>
                    <td><?= $item['rating_produsen'] ?></td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        <div class="card-body">
            <form class="item-form" method="POST" action="">
                <!-- <div class="form-group">
                    <label>Batik Name</label>
                    <input type="text" name="bName" placeholder="Input batik name." value="<?php echo $name; ?>" required>
                </div>
                <div class="form-group">
                    <label>Batik Origin</label>
                    <input type="text" name="bOrigin" placeholder="Input batik origin." value="<?php echo $origin; ?>" required>
                </div> -->
                <div class="form-group">
                    <label>Manufacturer</label>
                    <input type="text" name="bManufacturer" placeholder="Input batik manufacturer." value="<?php echo $manuf; ?>" required>
                </div>
                <div class="form-group">
                    <label>Manufacturer Rating</label>
                    <input type="text" name="bManufRating" placeholder="Input manufacturer rating." value="<?php echo $manufRating; ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="bPrice" placeholder="Input batik price." value="<?php echo $price; ?>" required>
                </div>
                <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="bStock" placeholder="Input available stock." required>
                </div> -->
                <div class="submit-group">
                    <button class="submit-btn" type="submit" name="submitProdusen">Edit</button>
                    <button class="reset-btn" type="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Manufacturer Data End -->

    <!-- Edit Stock Data Start -->
    <div class="list-item-card">
        <div class="add-stok-title">
            <h1>Edit Item Stock Data</h1>
        </div>
        <div class="card-header">
            Item Stock List
        </div>
        <div class="card-body">
            <table class="item-table">
                <tr>
                    <th>Batik ID</th>
                    <th>Item Stock</th>
                    <?php
                    while ($item = mysqli_fetch_array($sTable)) :
                    ?>
                <tr>
                    <td><?= $item['id_batik'] ?></td>
                    <td><?= $item['jumlah_stok'] ?></td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        <div class="card-body">
            <form class="item-form" method="POST" action="">
                <!-- <div class="form-group">
                    <label>Batik Name</label>
                    <input type="text" name="bName" placeholder="Input batik name." value="<?php echo $name; ?>" required>
                </div>
                <div class="form-group">
                    <label>Batik Origin</label>
                    <input type="text" name="bOrigin" placeholder="Input batik origin." value="<?php echo $origin; ?>" required>
                </div> -->
                <!-- <div class="form-group">
                    <label>Manufacturer</label>
                    <input type="text" name="bManufacturer" placeholder="Input batik manufacturer." value="<?php echo $manuf; ?>" required>
                </div>
                <div class="form-group">
                    <label>Manufacturer Rating</label>
                    <input type="text" name="bManufRating" placeholder="Input manufacturer rating." value="<?php echo $manufRating; ?>" required>
                </div> -->
                <!-- <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="bPrice" placeholder="Input batik price." value="<?php echo $price; ?>" required>
                </div> -->
                <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="bStock" placeholder="Input available stock." value="<?php echo $stock; ?>" required>
                </div>
                <div class="submit-group">
                    <button class="submit-btn" type="submit" name="submitStok">Edit</button>
                    <button class="reset-btn" type="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Stock Data End -->
</body>

</html>