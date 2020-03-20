
<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $id_user = $_SESSION['id_user']; 
   $username = $_SESSION['username']; 
   $nama_user = $_SESSION['nama_user']; 
}
?>

<html>
<head>
<title>Halaman Sukses Login</title>
<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	
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
		 
		<?php
			include "koneksi.php";
			$query = mysqli_query($connection,"SELECT * from transaksi");
		?>
			<form action="" method="post">
				<a href="form_order.php">+ Tambah Data</a> 
				<table border="1" width="750px">
					<tr>
						<th>ID</th>
						<th>ID User</th>
						<th>ID Order</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Bayar</th>
						<th>Kembalian</th>
						<th>Aksi</th>
					</tr>
					<?php if(mysqli_num_rows($query)>0){ ?>
					<?php
						$no = 1;
						while($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data["id_transaksi"];?></td>
						<td><?php echo $data["id_user"];?></td>	
						<td><?php echo $data["tanggal"];?></td>						
						<td><?php echo $data["total"];?></td>
						<td><?php echo $data["bayar"];?></td>
						<td><?php echo $data["kembalian"];?></td>
						<td>
							<a href="print_transaksi.php?id_transaksi=<?php echo $data['id_transaksi']; ?>">Print</a> 
							
						</td>
					</tr>
					<?php $no++; } ?>
					<?php } ?>
    </table>
</form>

</body>
</html>