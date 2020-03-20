<?php
	session_start();
   require_once("koneksi.php");
   $id_order = $_POST['id_order'];
   $no_meja = $_POST['no_meja'];
   $tanggal = $_POST['tanggal'];
   $id_user = $_SESSION['id_user'];
   $id_detail = $_POST['id_detail'];
   $masakan = $_POST['masakan'];
   $jumlah = $_POST['jumlah'];
   $keterangan = $_POST['keterangan'];
   $status_order =  $_POST['status_order'];
	
	$query = " INSERT INTO `orderan` 
	(`id_order`,`no_meja`,`tanggal`,`id_user`,`keterangan`,`status_order`) 
	VALUES ('$id_order','$no_meja','$tanggal','$id_user','$keterangan','$status_order')";

	$check = mysqli_query($connection,$query);
	
	if($check){
		foreach($masakan as $key => $value){
			$queryx = "INSERT INTO detail_order 
						(id_detail_order,id_order,id_masakan,jumlah,keterangan,status_detail_order) VALUES
						(NULL,'$id_order','$value','$jumlah[$key]','$keterangan','$status_order')";
			mysqli_query($connection,$queryx);
		}
	}
	header('location:view_order.php');
?>