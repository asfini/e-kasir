<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
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
			<li><a href="form_transaksi.php">Transaksi</a></li>
			<li><a href="form_user.php">User</a></li>
		</ul>
	</div>

		<div class="badan">		
			<div align='center'>
				<?php
					include "koneksi.php";
					$id_masakan = $_GET['id_masakan'];
					$query = mysqli_query($connection,"select * from masakan where id_masakan='$id_masakan'");
					while($data = mysqli_fetch_array($query)){
				?>
				  <form action="update_masakan.php" method="post">

				  <h3>Masakan</h3>
				  <table>
					  <tbody>
					  <tr>
						  <td>ID Masakan</td>
						  <td> : <input name="id_masakan" type="text" readonly value="<?php echo $data['id_masakan']; ?>">
						  </td>
					  </tr>
					  <tr>
						  <td>Nama Masakan</td>
						  <td> : <input name="nama_masakan" type="text" value="<?php echo $data['nama_masakan']; ?>">
						  </td>
					  </tr>
					  <tr>
						  <td>Harga</td>
						  <td> : <input name="harga" type="text" value="<?php echo $data['harga']; ?>">
						  </td>
					  </tr>
					  <tr>
						  <td>Status Masakan</td>
						  <td> :	<select name = "status_masakan">
										<option <?php if( $data['status_masakan']=='Tersedia'){echo "selected"; } ?> value='Tersedia'>Tersedia</option>
										<option <?php if( $data['status_masakan']=='Tidak Tersedia'){echo "selected"; } ?> value='Tidak Tersedia'>Tidak Tersedia</option>

									</select>

						  </td>
					  </tr>
					  <tr><td colspan="2" align="right"><input value="Update" type="submit"></td></tr>
					  
					  </tbody>
					  
				  </table>
				  </form>
				<?php 
					}
				?>
			</div>

		</div>
</div>

</body>
</html>