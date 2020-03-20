<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM view_registrasi WHERE username = '$username' AND password = '$password'";
   $query = $connection->query($sql);
   $hasil = $query->fetch_assoc();
   if($query->num_rows == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($password <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else if ($hasil['level']=="admin"){

		// buat session login dan username
		$_SESSION['id_user'] = $id_user;
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header('location:index.php');
     }
	 else if ($hasil['level']=="waiter"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $id_user;
		$_SESSION['level'] = "waiter";
		// alihkan ke halaman dashboard admin
		header('location:halaman_waiter.php');
     }
     }
?>