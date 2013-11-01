<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update</title>
</head>
<body>
	<?PHP
	//rÃ©cupÃ©ration des donnÃ©es
	$idR = $_POST['id'];
	//declaration des paramÃ¨tre
	$serveur = "localhost";
	$BD = "pwd";
	$user = "root";
	$pwd = "";
	//connexion au serveur BD
	$lien = mysql_connect($serveur,$user,$pwd) or die("Impossible de se connecter Ã  la base de donnÃ©es");
	//selection de la base de donnÃ©es
	mysql_select_db($BD,$lien);
	//definition de la requete 
	$query = "select * from pwd where id_pwd = '$idR'";
	//execution de la requete
	$cur = mysql_query($query);
	 ?>
	<form method="post" action="update2.php">
	<?PHP
	while($ligne = mysql_fetch_array($cur))
			{
	?>
	<input type="hidden" name='id' value="<?PHP echo $ligne['id_pwd'];?>" />
		<table border="1" width="50%">
			
			<tr>
				<td>name of website</td>
				<td><input type="text" name="name_site" value="<?PHP echo $ligne['name_site'];?>" /></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="e_mail" value="<?PHP echo $ligne['e_mail'];?>" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="pwd1" value="<?PHP echo $ligne['pwd1'];?>" /></td>
			</tr>
		
		</table>
			
		<?PHP 
		}
		 ?>
		<input type="submit" value="Ok" />
	
	</form>
	
</body>
</html>
