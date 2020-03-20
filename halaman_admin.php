<?php
session_start();
if(!isset($_SESSION['nama_user'])) {
   header('location:login.php'); 
} else { 
$id_user = $_SESSION['id_user']; 
   $nama_user = $_SESSION['nama_user']; 
}
?>

<html>
<head>
<title>Halaman Sukses Login</title>
<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- menghubungkan dengan file jquery -->
	<script type="text/javascript" src="jquery.js"></script>

</head>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <a href="logout.php"><b>Logout</b></a>
</div>
<body>

<div class="content">
	<header>
		<h1 class="judul">e-Kasir</h1>
	</header>

	<div class="menu">
		<ul>
			<li><a href="#">HOME</a></li>
			<li><a href="#">TENTANG</a></li>
			<li><a href="#">TUTORIAL</a></li>
		</ul>
	</div>

	<div class="badan">

	<p>
	Dalam membuat sebuah sistem kita membuat aplikasi beserta databasenya. didalam database terdapat banyak table yang saling terhubung. untuk menampilkan informasinya kita membuat join table dengan query SQL yang panjang
	</p>
	

	</div>
</div>


</body>
</html>