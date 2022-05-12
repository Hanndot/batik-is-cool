<?php
// Create database connection using config file
include_once("config.php");
// Fetch data
$makanan = mysqli_query($mysqli, "SELECT * FROM makanan WHERE
is_delete=0 ORDER BY id_makanan DESC");
$minuman = mysqli_query($mysqli, "SELECT * FROM minuman WHERE
is_delete=0 ORDER BY id_minuman DESC");
$paket = mysqli_query($mysqli, "SELECT A.kode_paket, A.nama_paket,
A.harga_paket, B.nama_makanan, C.nama_minuman from paket A INNER
JOIN makanan B ON A.id_makanan = B.id_makanan INNER JOIN minuman C
ON A.id_minuman = C.id_minuman");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Homepage</title>

</head>

<body>
    <h1>Kelompok XX</h1>
    <h3>Tabel Makanan</h3>
    <table width='80%' border=1>
        <a href="add.php">Tambah Makanan</a>
        <tr>

            <th>Nama Makanan</th>
            <th>Harga Makanan</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($makanan)) {
            echo "<tr>";
            echo "<td>" . $item['nama_makanan'] . "</td>";
            echo "<td>" . $item['harga_makanan'] . "</td>";
            echo "<td><a href='edit.php?id=$item[id_makanan]'>Edit</a> | <a href='delete.php?id=$item[id_makanan]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <h3>Tabel Minuman</h3>
    <table width='80%' border=1>
        <a href="addMinuman.php">Tambah Minuman</a>
        <tr>

            <th>Nama Minuman</th>
            <th>Harga

                Minuman</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($minuman)) {
            echo "<tr>";
            echo "<td>" . $item['nama_minuman'] . "</td>";
            echo "<td>" . $item['harga_minuman'] . "</td>";

            echo "<td><a
href='editMinuman.php?id=$item[id_minuman]'>Edit</a> | <a
href='deleteMinuman.php?id=$item[id_minuman]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <h3>Tabel Paket</h3>
    <table width='80%' border=1>
        <tr>
            <th>Nama Paket</th>
            <th>Makanan</th>
            <th>Minuman</th>

            <th>Harga Paket</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($paket)) {

            echo "<tr>";
            echo "<td>" . $item['nama_paket'] . "</td>";
            echo "<td>" . $item['nama_makanan'] . "</td>";
            echo "<td>" . $item['nama_minuman'] . "</td>";
            echo "<td>" . $item['harga_paket'] . "</td>";

            echo "<td><a

href='deletePaket.php?id=$item[kode_paket]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>