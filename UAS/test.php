<?php
require 'function.php';

// ambil data dari database
$barang = query("SELECT * FROM Barang");
$pelanggan = query("SELECT * FROM Pelanggan");
?>

<html lang="en">

<head>
  <title>Document</title>
</head>

<body>
  <h1> Daftar Barang</h1>
  <table width="40%" border="2" cellpadding="10" cellspacing="0" <tr>
    <th>kd_barang</th>
    <th>Aksi</th>
    <th>nm_barang</th>
    <th>stok</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($barang as $brg) : ?>
      <tr>
        <td> <?= $i; ?></td>
        <td>
          <a href=""> Ubah</a>
          <a href=""> Hapus</a>
        </td>
        <td><?= $brg["nm_barang"]; ?></td>
        <td><?= $brg["stok"]; ?></td>
        <?php $i++; ?>
      </tr>
    <?php endforeach; ?>
  </table>

  <br>
  <table width="40%" border="2" cellpadding="10" cellspacing="0" </table>
    <tr>
      <th>id_pelanggan</th>
      <th>Aksi</th>
      <th>nm_pelanggan</th>
      <th>Alamat</th>
      <th>Kota</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($pelanggan as $buyer) : ?>
      <tr>
        <td> <?= $i; ?></td>
        <td>
          <a href=""> Ubah</a>
          <a href=""> Hapus</a>
        </td>
        <td><?= $buyer["nm_pelanggan"]; ?></td>
        <td><?php $buyer["Alamat"] ?></td>
        <td><?= $buyer["Kota"]; ?></td>
        <?php $i++; ?>
      </tr>
    <?php endforeach; ?>
</body>

</html>