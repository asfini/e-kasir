<?php
session_start();
   require_once("koneksi.php");
   $id_masakan = $_POST['id_masakan'];
   $nama_masakan = $_POST['nama_masakan'];
   $harga =  $_POST['harga'];
   $status_masakan =  $_POST['status_masakan'];
   
  $query = " INSERT INTO `masakan` (`id_masakan`, `nama_masakan`,`harga`,`status_masakan`) 
			  VALUES ('$id_masakan','$nama_masakan','$harga','$status_masakan')";

	mysqli_query($connection,$query);
 
	header('location:view_masakan.php');
?>