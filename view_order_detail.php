
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
			<li><a href="form_transaksi.php">Transaksi</a></li>
			<li><a href="form_user.php">User</a></li>
		</ul>
	</div>

	<div class="badan">
		<div align='center'> 
	<form action = "simpan_transaksi.php" method = "POST" >
			<?php
				include "koneksi.php";
				$query = mysqli_query($connection,"SELECT * from view_detail where id_order = '$_GET[id_order]'");
						
						
					?>
					<?php if(mysqli_num_rows($query)>0){ ?>
						<?php
							
							if($data = mysqli_fetch_array($query)){
						?>
			
		ID Order : <input name="id_order" readonly type="text" value="<?php echo $data['id_order']; ?>">
		Pelanggan  : <input name="id_user" readonly type="text"value="<?php echo $nama_user; ?>">
		No Meja  : <input name="no_meja" readonly type="text"value="<?php echo $data['no_meja']; ?>">
		Tanggal  : <input name="tanggal" readonly type="date"value="<?php echo $data['tanggal']; ?>">
			
						<?php } ?>
						<?php } ?>
			
			<table>
					<tr>
						<th>ID Masakan </th>
						<th>Nama Masakan</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Sub Total</th>
					</tr>
					<?php
						include "koneksi.php";
						$query = mysqli_query($connection,"SELECT * from view_detail WHERE id_order  = '$_GET[id_order]' AND id_user = $id_user");
						
						
					?>
					<?php if(mysqli_num_rows($query)>0){ ?>
						<?php
							$total=0;
							while($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $data['id_masakan']; ?></td>
						<td><?php echo $data['nama_masakan']; ?></td>
						<td><?php echo $data['jumlah']; ?></td>
						<td><?php echo $data['harga']; ?></td>
						<td><?php echo $data['subtotal']; ?></td>
					</tr>
					
						<?php } ?>
						<?php } ?>
					<tr>
					<td colspan="5" align="right">
					<?php
						include "koneksi.php";
						$query = mysqli_query($connection,"SELECT sum(subtotal) as total from view_detail WHERE id_order  = '$_GET[id_order]' AND id_user = $id_user");
						
						
					?>
					<?php if(mysqli_num_rows($query)>0){ ?>
						<?php
							$total=0;
							while($data = mysqli_fetch_array($query)){
					?>
						  Total : <input name="total" id = "total" readonly type="text"value="<?php echo $data['total']; ?>">
					<?php } ?>
					<?php } ?>
					</td>
					</tr>
					<tr>
						<td colspan="5" align="right">
						Bayar : <input name="bayar" id = "bayar" type="text" onkeyup = "hitung();">
					  </td>
					</tr>
					<tr>
						<td colspan="5" align="right">
						Kembalian : <input name="kembalian" id = "kembalian" onkeyup = "hitung();" type="text" readonly>
					  </td>
					</tr>
					<tr>
					  <td colspan="5" align="right">
						  <input value="Bayar" type="submit">
					  </td>
					</tr>
<script>
function hitung() {
      var total = document.getElementById('total').value;
      var bayar = document.getElementById('bayar').value;
      var result = parseInt(bayar) - parseInt(total);
      if (!isNaN(result)) {
         document.getElementById('kembalian').value = result;
      }
}
</script>
				</table>
			
</form>		
		</div>
	</div>
</body>
</html>