<html>
<head>
	<title>e-Kasir</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1>e-Kasir</h1>
 
	<div class="kotak_login">
		<p class="tulisan_login">Daftar Akun Baru</p>
		
		<form action="proses_daftar.php" method="post">
		  <table>
			  <tbody>
			  <tr><td>ID User</td><td> : <input name="id_user" type="text"></td></tr>
			  <tr><td>Username</td><td> : <input name="username" type="text"></td></tr>
			  <tr><td>Password</td><td> : <input name="password" type="password"></td></tr>
			  <tr><td>Nama User</td><td> : <input name="password" type="text"></td></tr>
			  <tr><td>ID Level</td><td> : <input name="password" type="text"></td></tr>
			  <tr><td colspan="2" align="right"><input value="Daftar" type="submit"> <input value="Batal" type="reset"></td></tr>
			  <tr><td colspan="2" align="center">Sudah Punya akun ? <a href="login.php"><b>Login</b></a></td></tr>
			  </tbody>
		  </table>
		</form>
		
	</div>
 
 
</body>
</html>