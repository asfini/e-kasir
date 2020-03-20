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
			$query = mysqli_query($connection,"SELECT * from masakan");
		?>
			<form action="" method="post">
				<a href="form_masakan.php">+ Tambah Data</a> 
				<table border="1" width="750px">
					<tr>
						<th>NO</th>
						<th>ID Masakan</th>
						<th>Nama Masakan</th>
						<th>Harga</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					<?php if(mysqli_num_rows($query)>0){ ?>
					<?php
						$no = 1;
						while($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data["id_masakan"];?></td>
						<td><?php echo $data["nama_masakan"];?></td>	
						<td><?php echo $data["harga"];?></td>						
						<td><?php echo $data["status_masakan"];?></td>
						<td>
							<a href="edit_masakan.php?id_masakan=<?php echo $data['id_masakan']; ?>">Edit</a> | 
							<a href="delete_masakan.php?id_masakan=<?php echo $data['id_masakan']; ?>">Delete</a> 
							
						</td>
					</tr>
					<?php $no++; } ?>
					<?php } ?>
    </table>
</form>

</body>
</html>