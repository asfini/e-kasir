<?php
include '../koneksi/root_db.php';
				error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
				
 
 
switch ($_GET['perintah']) 
{
	
	//Jika aksi yang dipilih insert
case "insert" :
$nomor = security($_POST['nomor']);  
$tgl = date("Y-m-d");
$brg = $_POST['brg'];
$kodesup = $_POST['kodesup'];
$jumlah = $_POST['jumlah'];

$barang = array();

	$query = " INSERT INTO `permintaan_barang` (`no_permintaan`, `tanggal`) 
			VALUES ('$nomor','$tgl')";

			mysql_query($query);

	foreach($brg as $i => $v){
		$barang[$i]['jml'] = $jml[$i];
		//menggantung, g bisa masuk database
		$query1 = "INSERT INTO `permintaan_barang_det` (`id_det`, `no_permintaan`, `kode_barang`, `jumlah`) VALUES(null, '$nomor','$brg[$i]','$jumlah[$i]')";
		mysql_query($query1);
	
	}
	echo '<script>
				alert(\'Data Barang Permintaan Pembelian Disimpan!\');
				window.location="../index.php?modul=permintaan&aksi=tampil";
				</script>';
break;
	
case "update":
$kode1=security($_GET['kode']);
			//Menghapus Detail data PP pada Tabel Detail PP
			$hapus = "DELETE from permintaan_barang where no_permintaan='".$kode1."'"; 
			//perintah delete data dikerjakan
			$hasil = mysql_query($hapus); 
			
			$brg = $_POST['brg'];
			$jml = $_POST['jml'];
			$barang = array();
				foreach($brg as $i => $v){
					$barang[$i]['jml'] = $jml[$i];
					$query1 = "INSERT INTO `permintaan barang` (`no_permintaan`,`tanggal`,`NIP`, `kode_barang`, `kode_supplier`, `jumlah_permintaan`) VALUES('$kode1','$brg[$i]','$jml[$i]')";
					mysql_query($query1);
					}
			//Jika data telah diupdate maka tampilkan data
			 echo 
			  '<script>
				alert(\'Data Permintaan Pembelian Berhasil Diupdate!\');
				window.location="../index.php?modul=permintaan&aksi=tampil";
				</script>';
			
			
			break; 
			//End aksi update
			
case "delete":
//$delete="DELETE from akun where id='".$_GET[id]."'";  
$kode=security($_GET['kode']);
		$cari="Select * from permintaan_barang where no_permintaan='".$kode."'";
			$hasil=mysql_query($cari);
			$dt=mysql_num_rows($hasil);
			
			if($dt>0)
			{
			$delete="DELETE from permintaan_barang_det where no_permintaan='".$kode."'";
			$hasil=mysql_query($delete);
			$delete1="DELETE from permintaan_barang where no_permintaan='".$kode."'";
			$hasil=mysql_query($delete1);
			
			
			echo'<script>
			alert(\'Data Permintaan Pembelian Berhasil Dihapus!\');
				window.location="../index.php?modul=permintaan&aksi=tampil";
				</script>';
			}
			else {
			echo'<script>
			alert(\'Maaf ! Data Permintaan Pembeliaan tidak dapat dihapus\');
				window.location="../index.php?modul=permintaan&aksi=tampil";
				</script>';
				}
				
			
			
				break; 
}
?>