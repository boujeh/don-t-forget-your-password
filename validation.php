<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>List website</title>
</head>

<body>


<h1>List website </h1>

<?php 
$connexion = mysql_connect("localhost","root", "");
mysql_select_db('pwd',$connexion) or die("erreur base de donnÃ©es");

$sql = "select * from pwd ";
$cur = mysql_query($sql);

?>
<form method="post" action="update1.php">

<table border="1" width="50%">
	<tr>
				<td>name of website</td>
				<td>E-mail</td>
				<td>password</td>
				<td>select for modifications</td>
				
	</tr>
			<?PHP
				while($ligne = mysql_fetch_array($cur))
				{
			?>
			<tr>
				
				<td><?PHP echo $ligne['name_site'];?></td>
				<td><?PHP echo $ligne['e_mail'];?></td>
				<td><?PHP echo $ligne['pwd1'];?></td>
				<td><input type="radio" name="id" value="<?PHP echo $ligne['id_pwd']; ?>" /></td>
               
				
               
                
			</tr>
			<?PHP
				}
			?>
		</table>
		
		<a href='add_new.html'>Go to add website</a>
        <a href="bienvenu.html">Back to home </a>
		<input type="submit" value="Update" />
        <a href='del.php'>go to delete </a>
</form>
</body>
</html>

