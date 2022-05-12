<?php

include 'config.php';

error_reporting(0);

// $data = mysqli_query($conn, "SELECT A.nama_batik, A.asal_batik, B.nama_produsen, B.rating_produsen,
//                               A.harga_batik, C.jumlah_stok FROM batik A INNER JOIN produsen B 
//                               ON A.id_batik = B.id_batik INNER JOIN stok C ON A.id_batik = C.id_batik");

// $data = mysqli_query($conn, "SELECT A.id_batik, A.nama_batik, A.asal_batik, A.is_delete, B.nama_produsen, B.rating_produsen,
//                               A.harga_batik, C.jumlah_stok FROM batik A INNER JOIN produsen B 
//                               ON A.id_batik = B.id_batik INNER JOIN stok C ON A.id_batik = C.id_batik WHERE A.is_delete=0");


// $nama_batik = $_POST['bName'];
// $asal_batik = $_POST['bOrigin'];
// $harga_batik = $_POST['bName'];

if (isset($_POST['submit'])) {
    $nama_batik = $_POST['bName'];
    $asal_batik = $_POST['bOrigin'];
    $harga_batik = $_POST['bPrice'];
    // $nama_produsen = $_POST['bManufacturer'];
    // $rating_produsen = $_POST['bManufRating'];
    // $jumlah_stok = $_POST['bStock'];
    // $id_batik = mysqli_query($conn, "SELECT id_batik FROM batik");

    $insertBatik = mysqli_query($conn, "INSERT INTO batik (nama_batik, asal_batik, harga_batik)
                                        VALUES ('$nama_batik', '$asal_batik', $harga_batik)");

    // $insertProdusen = mysqli_query($conn, "INSERT INTO produsen (id_batik, nama_produsen, rating_produsen)
    //                                        VALUES ($id_batik + 1, '$nama_produsen', '$rating_produsen')");

    // $insertStok = mysqli_query($conn, "INSERT INTO stok (id_batik, jumlah_stok)
    //                                    VALUES ($id_batik + 1, $jumlah_stok)");

    // $query

    // mysqli_multi_query($conn, $);

    // if ($insertBatik && $insertProdusen && $insertStok) {
    //     echo "<script>
    //             alert('C(reate)RUD success!');
    //             document.location='homePage.php';
    //           </script>";
    // } else {
    //     echo "<script>
    //             alert('C(reate)RUD failed!');
    //             document.location='homePage.php';
    //           </script>";
    // }
    if ($insertBatik) {
        echo "Adding New Batik is Successful! <a href='homePage.php'>Refresh</a>";
    }
}

if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $data = mysqli_query($conn, "SELECT A.id_batik, A.nama_batik, A.asal_batik, A.is_delete, B.nama_produsen, B.rating_produsen,
                                 A.harga_batik, C.jumlah_stok FROM batik A INNER JOIN produsen B 
                                 ON A.id_batik = B.id_batik INNER JOIN stok C ON A.id_batik = C.id_batik WHERE A.is_delete=0
                                 AND (A.nama_batik LIKE'%$keyword%' OR A.asal_batik LIKE'%$keyword%' OR B.nama_produsen LIKE'%$keyword%')");

    if ($keyword == NULL) {
        $data = mysqli_query($conn, "SELECT A.id_batik, A.nama_batik, A.asal_batik, A.is_delete, B.nama_produsen, B.rating_produsen,
                              A.harga_batik, C.jumlah_stok FROM batik A INNER JOIN produsen B 
                              ON A.id_batik = B.id_batik INNER JOIN stok C ON A.id_batik = C.id_batik WHERE A.is_delete=0");
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
    <title>Batik - Home Page</title>

    <div class="home-header">
        <a href="index.php">log out</a>
    </div>
</head>

<body class="home-container">
    <div class="home-title">
        <h1>Batik is Cool<br />Database</h1>
    </div>
    <div class="add-item-card">
        <div class="card-header">
            Batik is Cool Add Item Form
        </div>
        <div class="card-body">
            <form class="item-form" method="POST" action="">
                <div class="form-group">
                    <label>Batik Name</label>
                    <input type="text" name="bName" placeholder="Input batik name." required>
                </div>
                <div class="form-group">
                    <label>Batik Origin</label>
                    <input type="text" name="bOrigin" placeholder="Input batik origin." required>
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
                    <input type="number" name="bPrice" placeholder="Input batik price." required>
                </div>
                <!-- <div class="form-group">
                    <label>Item Stock</label>
                    <input type="number" name="bStock" placeholder="Input available stock." required>
                </div> -->
                <div class="submit-group">
                    <button class="submit-btn" type="submit" name="submit">Submit</button>
                    <button class="reset-btn" type="reset" name="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <div class="list-item-card">
        <div class="card-header">
            Batik is Cool Item List
        </div>
        <div>
            <a href="addProdusen.php">Add Manufacturer</a> |
            <a href="addStok.php">Add Stock</a>
        </div>
        <br>
        <form action="" method="post">
            <input type="text" name="keyword" placeholder="Search item..." autocomplete="off">
            <button type="submit" name="search">search</button>
        </form>
        <br>
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
                            <a href="editPage.php?id=<?= $item['id_batik'] ?>">Edit</a> |
                            <a href="deleteItem.php?id=<?= $item['id_batik'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <br>
        <a href="deletedItemPage.php">
            <input type="submit" value="Show Deleted Item(s).">
        </a>
    </div>
</body>

</html>