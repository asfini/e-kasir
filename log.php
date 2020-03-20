<html>
<head>
	<title>e-Kasir</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1>e-Kasir</h1>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="proses_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username atau email ..">
 
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<input type="submit" class="tombol_daftar" value="DAFTAR">
 
		</form>
		
	</div>
 
 
</body>
</html>