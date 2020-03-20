<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
   require_once("koneksi.php");
?>
<html>
<head>
	<title>e-Kasir</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1>e-Kasir</h1>
<title>Form Login</title>
  <div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="pros_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username . . .">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password . . .">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<input type="submit" class="tombol_daftar" value="DAFTAR">
 
		</form>
		
	</div>
</html>