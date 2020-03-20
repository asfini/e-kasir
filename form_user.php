<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
$id_user = $_SESSION['id_user']; 
   $username = $_SESSION['username']; 
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
			<li><a href="index.php">HOME</a></li>
			<li><a href="form_masakan.php">Masakan</a></li>
			<li><a href="form_order.php">Order</a></li>
			<li><a href="view_transaksi.php">Transaksi</a></li>
			<li><a href="form_user.php">User</a></li>
		</ul>
	</div>

	<div class="badan">

	
	<div align='center'>
		  <form action="simpan_masakan.php" method="post">
		  <h3>User</h3>
		  <table>
			  <tbody>
			  <tr>
				  <td>ID Masakan</td>
				  <td> : <input name="id_masakan" type="text">
				  </td>
			  </tr>
			  <tr>
				  <td>Nama Masakan</td>
				  <td> : <input name="nama_masakan" type="text">
				  </td>
			  </tr>
			  <tr>
				  <td>Harga</td>
				  <td> : <input name="harga" type="text">
				  </td>
			  </tr>
			  <tr>
				  <td>Status Masakan</td>
				  <td> :	<select name = "status_masakan">
								<option value="Tersedia" = >Tersedia</option>
								<option value="Tidak Tersedia">Tidak Tersedia</option>
							</select>

				  </td>
			  </tr>
			  <tr>
				  <td colspan="2" align="right">
					<a href="view_user.php">Lihat data</a>
					<input value="Simpan" type="submit"> 
					<input value="Batal" type="reset">
				  </td>
			  </tr>
			  </tbody>
		  </table>
		  </form>
	</div>

	</div>
</div>


</body>
</html>