<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_masakan   = $_POST['id_masakan'];
$nama_masakan = $_POST['nama_masakan'];
$harga = $_POST['harga'];
$status_masakan = $_POST['status_masakan'];
// query SQL untuk update data
$query="update masakan set nama_masakan = '$nama_masakan', harga = '$harga', status_masakan = '$status_masakan' where id_masakan = '$id_masakan'";
mysqli_query($connection, $query);
// mengalihkan ke halaman index.php
header("location:view_masakan.php");
?>