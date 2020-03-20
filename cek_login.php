<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connection,"select * from view_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['id_user'] = $id_user;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header('location:index.php');

	// cek jika user login sebagai waiter
	}else if($data['level']=="waiter"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "waiter";
		// alihkan ke halaman dashboard waiter
		header("location:halaman_waiter.php");

	// cek jika user login sebagai kasir
	}else if($data['level']=="kasir"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kasir";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_kasir.php");
		
	// cek jika user login sebagai owner
	}else if($data['level']=="owner"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "owner";
		// alihkan ke halaman dashboard owner
		header("location:halaman_owner.php");
		
	// cek jika user login sebagai pelanggan
	}else if($data['level']=="pelanggan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pelanggan";
		// alihkan ke halaman dashboard pelanggan
		header("location:halaman_pelanggan.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php");
	}	
}else{
	header("location:login.php");
}

?>