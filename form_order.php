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
		
		  <form action="simpan_order.php" method="post">
<?php
include "koneksi.php";
$query = mysqli_query($connection,"SELECT max(id_order) as terakhir from orderan");
$data = mysqli_fetch_array($query);
$lastID = $data['terakhir'];
$lastNoUrut = substr($lastID, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextID = "OD".sprintf("%03s",$nextNoUrut); 
?>

		  <h3>Order</h3>
		  <table>
			  <tbody>
			  <tr>
				  <td>ID Order</td>
				  <td> : <input name="id_order" required="required" value="<?php echo $nextID; ?>" readonly>
				  </td>
			  </tr>
			  <tr>
				  <td>No Meja</td>
				  <td> : <input name="no_meja" type="text">
				  </td>
			  </tr>
			 
			  <tr>
				  <td>Tanggal</td>
				  <td> : <input name="tanggal" type="date">
				  </td>
			  </tr>
			  <tr>
				  <td>Keterangan</td>
				  <td> : <input name="keterangan" type="text">
				  </td>
			  </tr>
			  <tr>
				  <td>Status Order</td>
				  <td> :	<select name = "status_order">
								<option value="Tersedia" = >Tersedia</option>
								<option value="Tidak Tersedia">Tidak Tersedia</option>
							</select>

				  </td>
			  </tr>
			</table>
			<table>
					<tr>
						<th>ID Masakan </th>
						<th>Nama Masakan</th>
						<th>Harga</th>
						<th>Pilih</th>
						<th>Jumlah</th>
					</tr>
					<?php
						include "koneksi.php";
						$query = mysqli_query($connection,"SELECT * from masakan");
						
						
					?>
					<?php if(mysqli_num_rows($query)>0){ ?>
						<?php
							
							while($data = mysqli_fetch_array($query)){
						?>
					<tr>
						<td><?php echo $data['id_masakan']; ?></td>
						<td><?php echo $data['nama_masakan']; ?></td>
						<td><?php echo $data['harga']; ?></td>
						<td>
							<label>
								<input name ="masakan[<?php echo $data['id_masakan']?>]" type="checkbox" value= "<?php echo $data['id_masakan']; ?>" > 
							</label>	
						</td>
						<td> : <input name ="jumlah[<?php echo $data['id_masakan']?>]" type="number" >
						
					</tr>
					
						<?php } ?>
						<?php } ?>
				
					<tr>
					  <td colspan="5" align="right">
						<a href="view_order.php">Lihat data</a>
						<input value="Simpan" type="submit">
					  </td>
					</tr>
				</table>  
			  </tbody>	
				
		  </form>
	</div>

	</div>
</div>


</body>
</html>