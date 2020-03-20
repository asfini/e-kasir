<?php
	session_start();
	require_once("koneksi.php");
	$id_user = $_SESSION['id_user'];
	$id_order = $_POST['id_order'];
	$tanggal = $_POST['tanggal'];
	$total = $_POST['total'];
	$bayar = $_POST['bayar'];
	$kembalian = $_POST['kembalian'];
	
	$query = " INSERT INTO `transaksi` VALUES (null,'$id_user','$id_order','$tanggal','$total','$bayar','$kembalian')";

	mysqli_query($connection,$query);
	
	header('location:view_transaksi.php');
?>