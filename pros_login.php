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
     } else {
			$_SESSION['id_user'] = $hasil['id_user']; // set session untuk nama
			$_SESSION['nama_user'] = $hasil['nama_user']; // set session untuk nama
			$_SESSION['username'] = $hasil['username']; // set session untuk nama
       header('location:index.php');
     }
	 
   }
?>