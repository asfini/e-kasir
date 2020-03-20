<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_masakan   = $_GET['id_masakan'];
// query SQL untuk insert data
$query="DELETE from  masakan where id_masakan ='$id_masakan'";
mysqli_query($connection, $query);
// mengalihkan ke halaman index.php
header("location:view_masakan.php");
?>